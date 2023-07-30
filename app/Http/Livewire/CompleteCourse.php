<?php

namespace App\Http\Livewire;

use App\Models\Course;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CompleteCourse extends Component
{
    public $questions;
    public $lesson;
    public $answers;

    public function mount()
    {
        $this->getQuetions();
    }
    public function getQuetions()
    {
        $this->questions = $this->lesson->questions()->with([
            'answers'
        ])->get();
    }

    public function completeLesson()
    {
        $course_id = $this->lesson->directory->course_id;

        $indexedAnswers = [];
        $answers = $this->questions->map(function ($q) {
            return $q->answers;
        });
        $answers->map(function ($a) use (&$indexedAnswers) {
            $a->map(function ($a) use (&$indexedAnswers) {
                $indexedAnswers[$a->id] = $a->correct;
            });
        });
        $marks = 0;
        $count = count($indexedAnswers);
        foreach ($indexedAnswers as $key => $answer) {
            if (!isset($this->answers[$key])) {
                $this->answers[$key] = false;
            }
            if ($answer == $this->answers[$key]) {
                $marks++;
            } else {
                $marks--;
            }
        }
        if ($marks / $count >= .8) {
            $count = DB::table('lesson_user')->where('user_id', auth()->user()->id)->where('lesson_id', $this->lesson->id)->count();
            if ($count == 0) {
                DB::table('lesson_user')->insert([
                    'user_id' => auth()->user()->id,
                    'lesson_id' => $this->lesson->id
                ]);
            }
            session()->flash('success', 'لقد اجتزت هذا الدرس بنجاح');
            $courseLessons = Course::find($course_id)->lessons()->pluck('lessons.id');
            $numOfCourseLessons = $courseLessons->count();
            $completed_course_lessons_count = DB::table('lesson_user')->where('user_id' , auth()->user()->id)->whereIn('lesson_id' , $courseLessons)->count();
            if($numOfCourseLessons == $completed_course_lessons_count){
                DB::table('course_user')->where('user_id', auth()->user()->id)->where('course_id' , $course_id)->update([
                    'is_completed' => true
                ]);
            }
        } else {
            session()->flash('failed', 'للأسف الإجابات غير دقيقة كفاية تحتاج لإعادة المحاولة');
        }
    }


    public function render()
    {
        return view('user.livewire.complete-course');
    }
}
