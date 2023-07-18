<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ShowLessonContents extends Component
{
    public $course;
    public $lesson;
    public $tab = 'lesson';

    public function changeTab($tab)
    {
        $this->tab = $tab;
        $this->mount();
        $this->render();
    }
    public function render()
    {
        return view('user.livewire.show-lesson-contents');
    }
}
