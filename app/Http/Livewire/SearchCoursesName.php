<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SearchCoursesName extends Component
{
    public $name;
    public function updatedName()
    {
        $this->emit('name' , $this->name);
    }
    public function render()
    {
        return view('user.livewire.search-courses-name');
    }
}
