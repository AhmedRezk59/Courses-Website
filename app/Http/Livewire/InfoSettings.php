<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Http\File;
use  Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;

class InfoSettings extends Component
{
    use WithFileUploads;
    public $email;
    public $first_name;
    public $last_name;
    public $phone_number;
    public $avatar;
    protected function rules()
    {
        return [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'string'],
            'email' => ['required', 'email', 'max:255', Rule::unique(User::class)->ignore(auth()->user()->id)],
            'avatar' => ['sometimes', 'nullable', 'image']
        ];
    }
    public function __construct()
    {
        $this->email = auth()->user()->email;
        $this->first_name = auth()->user()->first_name;
        $this->last_name = auth()->user()->last_name;
        $this->phone_number = auth()->user()->phone_number;
    }
    public function updateInfo(Request $request)
    {
        $this->validate();
        $data = [
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'phone_number' => $this->phone_number,
            'email' => $this->email,
        ];
        if (isset($this->avatar)) {
            $hash = $this->avatar->hashName();
            Image::make($this->avatar)
                ->resize(100, 100, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(Storage::path("avatars/users/" . auth()->user()->id . "/{$hash}"));
            $data['avatar'] = $hash;
        }
        auth()->user()->update($data);
        $this->emit('update-info');
    }
    public function render()
    {
        return view('user.livewire.info-settings');
    }
}
