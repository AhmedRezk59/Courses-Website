<?php

namespace App\Http\Controllers;

use App\Enums\CourseStatus;
use App\Mail\CourseCompletionCertificate;
use App\Models\Course;
use App\Models\Currency;
use App\Models\Lesson;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

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
        $first_lesson_id = $course->lessons()->first()->id;
        if ($first_lesson_id != $lesson->id && $lesson->id - $last_completed_lessons->max() > 1) {
            $nextLesson = $course->lessons->where('id', '>', $last_completed_lessons->max())->first();

            session()->flash('failed', 'لابد أن تكمل الدروس وفقا للترتيب');
            return to_route('courses.lesson.view', $nextLesson->id);
        }
        $lesson->load('attachment');
        return view('user.lesson_show', compact('lesson', 'course'));
    }

    public function quiz(Course $course)
    {
        abort_if(!auth()->user()->own($course->id), 403);
        $course_lessons = $course->lessons->pluck('id');
        $completed_lessons = DB::table('lesson_user')->where('user_id', auth()->user()->id)
            ->whereIn('lesson_id', $course_lessons)
            ->pluck('lesson_id');
        if ($course_lessons->count() != $completed_lessons->count()) {
            session()->flash('failed', 'لابد أن تنهى جميع الدروس أولا');
            return back();
        }
        $questions = $course->questions()->with('answers')->get();
        return view('user.final_quiz', ['course' => $course, 'questions' => $questions]);
    }

    public function sendCourseCompletionCertificate(Course $course)
    {
        abort_if(!auth()->user()->own($course->id), 403);
        if (Carbon::now()->lt($course->end_date)) {
            session()->flash('failed', 'لابد أن تنتهى الدورة أولا');
            return back();
        }
        $course_user_status = DB::table('course_user')->where('user_id', auth()->user()->id)
            ->where('course_id', $course->id)
            ->value('is_completed');
        if ($course_user_status  != true) {
            session()->flash('failed', 'لابد أن تنهى جميع الدروس والاختبار النهائى أولا');
            return back();
        }
        Mail::to(auth()->user())->send(new CourseCompletionCertificate(auth()->user(), $course));
        return back()->with('success', 'لقد تم إرسال الشهادة إلى بريدك الإلكترونى');
    }
}
