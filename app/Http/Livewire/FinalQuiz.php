<?php

namespace App\Http\Livewire;

use Livewire\Component;

class FinalQuiz extends Component
{
    public $questions = [['noAs' => 2]];
    public $noq = 1;
    public $course;
    protected $rules = [
        'questions.*.question' => ['required', 'array', 'min:1'],
        'questions.*.question.body' => ['required', 'string', 'max:255'],
        'questions.*.question.answers' => ['required', 'array', 'min:2'],
        'questions.*.question.answers.*.body' => ['required', 'string', 'max:255'],
    ];
    protected $validationAttributes = [
        'answers' => 'الإجابات',
        'questions' => 'الأسئلة',
        'questions.*.question.body' => 'عنوان السؤال',
        'questions.*.question.answers' => 'الإجابات',
        'questions.*.question.answers.*.body' => 'الإجابة',
    ];
    protected $messages = [
        'questions.*.question.answers' => 'يجب أن يكون إجابتان لكل سؤال على الأقل',
    ];
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

    public function submitQuiz()
    {
        $this->validate();
        foreach ($this->questions as $q) {
            $question = $this->course->questions()->create([
                'body' => $q['question']['body']
            ]);
            foreach ($q['question']['answers'] as $a) {
                $question->answers()->create([
                    'body' => $a['body'],
                    'correct' => isset($a['correct']) && $a['correct'] == 1 ? true : false
                ]);
            }
        }
        session()->flash('msg' , 'تم إضافة الأسئلة بنجاح');
        return redirect()->route('instructor.courses.show' , $this->course);
    }
    public function render()
    {
        return view('instructor.livewire.final-quiz');
    }
}
