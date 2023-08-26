<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CourseContentsView extends Component
{
    public $course;

    public function render()
    {
        return view('user.livewire.course-contents-view',[
            'questions' => $this->course->questions
        ]);
    }
}
