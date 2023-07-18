<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Illuminate\Validation\Rules\Password;
use Illuminate\Http\Request;

class AccountPasswordSettings extends Component
{
    public $email;
    public $current_password;
    public $password;
    public $password_confirmation;
    protected function rules()
    {
        return [
            'current_password' => ['required', 'current_password'],
            'password' => ['required', Password::defaults(), 'confirmed'],
        ];
    }
    public function __construct()
    {
        $this->email = auth()->user()->email;
    }

    public function updatePass(Request $request)
    {
        $this->validate();
        auth()->user()->update([
            'password' => Hash::make($this->password),
        ]);
        $this->emit('update-info');
    }
    public function render()
    {
        return view('user.livewire.account-password-settings');
    }
}
