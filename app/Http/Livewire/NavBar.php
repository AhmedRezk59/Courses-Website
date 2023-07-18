<?php

namespace App\Http\Livewire;

use Livewire\Component;

class NavBar extends Component
{
    protected $listeners = [
        'update-info' => '$refresh'
    ];
    public function render()
    {
        return view('user.livewire.nav-bar');
    }
}
