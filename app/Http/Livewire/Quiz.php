<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Quiz extends Component
{
    public $questions = [['noAs' => 1]];
    public $noq = 1;
    
    public function addQuestion()
    {
        array_push($this->questions , ['noAs' => 2]);
        $this->noq++;
    }
    public function addAnswer($q)
    {
        $this->questions[$q]['noAs']++;
    }
    
    public function render()
    {
        return view('instructor.lessons.quiz');
    }
}
