<?php

namespace App\Http\Controllers;

use App\Enums\CourseStatus;
use App\Models\Course;
use App\Models\Currency;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    public function index()
    {
        return view('user.courses');
    }

    public function show(Course $course)
    {
        $course->load('instructor')->loadCount('lessons');
        $currency = auth()->user()->currency->code ?? config('services.payments.default-currency');
        $currency_name = Currency::where('code', $currency)->first()->name;
        return view('user.show_course', compact('course', 'currency_name'));
    }

    public function mine()
    {
        return view('user.my_courses');
    }
    public function contents($id)
    {
        abort_if(!auth()->user()->own($id), 403);
        $course = Course::where('id', $id)->with([
            'directories' => function ($q) {
                $q->with('lessons');
            },
            'instructor:id,name'
        ])->first();
        return view('user.show_course_contents', compact('course'));
    }

    public function lesson(Lesson $lesson)
    {
        $course = $lesson->directory->course;
        abort_if(!auth()->user()->own($course->id), 403);
        $course_lessons = $course->lessons->pluck('id');
        $last_completed_lessons = DB::table('lesson_user')->where('user_id', auth()->user()->id)
            ->whereIn('lesson_id', $course_lessons)
            ->pluck('lesson_id');
        $max_lesson = $last_completed_lessons->max();
        if ($last_completed_lessons->isEmpty()) {
            $lesson = $course->lessons()->with('directory')->first();
            session()->flash('failed', 'لابد أن تكمل الدروس وفقا للترتيب');
            return to_route('courses.lesson.view', $lesson);
        } elseif ($lesson->id - $last_completed_lessons->max() > 1) {
            $nextLesson = DB::select('select `id` from `lessons` where `id` > ' . $last_completed_lessons->max() . ' limit 1');
            $nextLesson = collect($nextLesson)->first()->id;
            session()->flash('failed', 'لابد أن تكمل الدروس وفقا للترتيب');
            return to_route('courses.lesson.view', $nextLesson);
        }

        return view('user.lesson_show', compact('lesson', 'course'));
    }
}
