<?php

namespace App\Http\Controllers\Admin;

use App\Enums\CourseStatus;
use App\Http\Controllers\Controller;
use App\Jobs\SendSubscribersNewCourseMail;
use App\Mail\SendNewCourseAdded;
use App\Models\Course;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    public function show(Course $course)
    {
        abort_if($course->status === CourseStatus::REJECTED, 403, 'تم رفض المادة وحذفها');
        return view('admin.show_course', ['course' => $course]);
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
}
