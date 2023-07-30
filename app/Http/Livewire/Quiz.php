<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Quiz extends Component
{
    public $questions = [['noAs' => 2]];
    public $noq = 1;

    public function addQuestion()
    {
        array_push($this->questions, ['noAs' => 2]);
        $this->noq++;
    }
    public function addAnswer($q)
    {
        $this->questions[$q]['noAs']++;
    }
    public function removeQuestion($index)
    {
        if ($this->noq == 1) {
            session()->flash('error', 'لابد أن يوجد سؤال واحد على الأقل');
            return;
        }
        unset($this->questions[$index]);
        $this->questions = array_values(array_filter($this->questions));
        $this->noq--;
    }

    public function render()
    {
        return view('instructor.lessons.quiz');
    }
}
