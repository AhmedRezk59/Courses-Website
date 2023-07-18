<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Settings extends Component
{
    public $tab = "personalInfo";

    public function changeTab($tab)
    {
        $this->tab = $tab;
        $this->mount();
        $this->render();
    }
    protected $listeners = [
        'update-info' => 'flash'
    ];

    public function flash()
    {
        session()->flash('msg', 'تم تحديث بيانات الحساب');
    }
    public function render()
    {
        return view('user.livewire.settings');
    }
}
