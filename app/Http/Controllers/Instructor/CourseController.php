<?php

namespace App\Http\Controllers\Instructor;

use App\Enums\CourseStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Models\Course;
use App\Models\Department;
use App\Models\Directory;
use App\Repositories\CourseRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    public function __construct(public CourseRepository $courseRepository)
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();
        return view('instructor.courses.create_course', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCourseRequest $request)
    {
        $course = $this->courseRepository->createCourse($request);
        session()->flash('msg', 'تم إنشاء المادة بنجاح');
        return redirect()
            ->route('instructor.courses.show', $course->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course = Course::where('id', $id)->with(['directories' => function ($q) {
            return $q->with('lessons');
        }])->first();
        abort_if(auth()->guard('instructor')->user()->id != $course->instructor_id, 403);
        abort_if($course->status === CourseStatus::REJECTED, 403, 'تم رفض المادة وحذفها');
        return view('instructor.courses.show_course', ['course' => $course]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        abort_if(auth()->guard('instructor')->user()->id != $course->instructor_id, 403);
        $departments = Department::all();
        return view('instructor.courses.edit_course', ['course' => $course, 'departments' => $departments]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCourseRequest $request, Course $course)
    {
        $this->courseRepository->updateCourse($request->validated(), $course);
        session()->flash('msg', 'تم تعديل المادة بنجاح');
        return redirect()
            ->route('instructor.courses.show', $course->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        abort_if(auth()->guard('instructor')->user()->id != $course->instructor_id, 403);
        $count = DB::table('course_user')->where('course_id', $course->id)->where('user_id', auth()->guard('instructor')->user()->id)->count();
        if ($count > 0) {
            abort(403);
        }
        Storage::deleteDirectory("courses/{$course->id}");
        Directory::where('course_id', $course->id)->delete();
        $course->delete();
        session()->flash('msg', 'هذه المادة تم حذفها.');
        return to_route('instructor.courses.status');
    }
}
