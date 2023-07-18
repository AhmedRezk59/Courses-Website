<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Http\File;
use  Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $data = $request->validated();
        if (isset($data['avatar'])) {
            $image = pathinfo($data['avatar']);
            if (!file_exists(public_path(Storage::path("avatars/users/" . auth()->user()->id . "/{$image['basename']}")))) { 
                mkdir(Storage::path("avatars/users/" . auth()->user()->id), 666, true); 
            }
            Image::make(new File(Storage::path($data['avatar'])))
                ->resize(100, 100)->save(Storage::path("avatars/users/" . auth()->user()->id . "/{$image['basename']}"));
            $data['avatar'] = $image['basename'];
        }
        if(isset(auth()->user()->avatar)){
            Storage::delete("avatars/users/" . auth()->user()->id . "/" . auth()->user()->avatar);
        }
        auth()->user()->update($data);

        return back()->with('msg', 'تم تحديث بيانات الحساب');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
