<?php

namespace App\Http\Livewire;

use App\Models\Department;
use Livewire\Component;

class FilterCoursesCategories extends Component
{
    public $categories = [];
    public function updated($value)
    {
        $this->emit('categories', $this->categories);
    }

    public function render()
    {
        return view('user.livewire.filter-courses-categories', [
            'departments' => Department::select('id', 'name')->get()
        ]);
    }
}
