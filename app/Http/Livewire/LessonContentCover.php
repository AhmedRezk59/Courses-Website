<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LessonContentCover extends Component
{
    public $lesson;
    public $course;
    public function render()
    {
        return view('user.livewire.lesson-content-cover');
    }
}
