<?php

namespace App\Http\Controllers\Admin;

use App\Enums\CourseStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateCourseRequest;
use App\Jobs\SendSubscribersNewCourseMail;
use App\Mail\CourseDetailsGotModified;
use App\Mail\SendNewCourseAdded;
use App\Models\Course;
use App\Models\Department;
use App\Models\Subscriber;
use App\Repositories\CourseRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    public function __construct(private CourseRepository $courseRepository)
    {
    }
    public function show(Course $course)
    {
        abort_if($course->status === CourseStatus::REJECTED, 403, 'تم رفض المادة وحذفها');
        $departments = Department::all();
        return view('admin.show_course', ['course' => $course, 'departments' => $departments]);
    }

    public function change(Course $course, $status, Request $request)
    {
        abort_if(!in_array($status, array_column(CourseStatus::cases(), 'value')), 403);
        if ($status == CourseStatus::ACCEPTED->value) {
            dispatch(new SendSubscribersNewCourseMail($course));
        }
        $course->update([
            'status' => $status
        ]);
        if ($status == CourseStatus::REJECTED->value) {
            Storage::deleteDirectory('courses/' . $course->id);
        }

        return back()->with('msg', 'تم تغيير حالة المادة بنجاح');
    }

    public function update(UpdateCourseRequest $request, Course $course)
    {
        $this->courseRepository->updateCourse($request->validated(), $course);
        session()->flash('msg', 'تم تعديل المادة بنجاح');
        Mail::to($course->instructor->email)->send(new CourseDetailsGotModified($course));
        return redirect()
            ->route('admin.courses.show', $course->id);
    }
}
