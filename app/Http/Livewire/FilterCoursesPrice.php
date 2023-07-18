<?php

namespace App\Http\Livewire;

use Livewire\Component;

class FilterCoursesPrice extends Component
{
    public $price = 'all';
    public function updatedPrice()
    {
        $this->emit('price' , $this->price);
    }
    public function render()
    {
        return view('user.livewire.filter-courses-price');
    }
}
