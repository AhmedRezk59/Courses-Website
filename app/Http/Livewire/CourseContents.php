<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CourseContents extends Component
{
    public $course;
    public $tab = 'contents';
    
    public function changeTab($tab)
    {
        $this->tab = $tab;
        $this->mount();
        $this->render();
    }
    public function render()
    {
        return view('user.livewire.course-contents');
    }
}
