<?php

namespace App\Http\Controllers\InstructorAuth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Instructor;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('instructor.auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:3000'],
            'gender' => ['required', 'string', 'in:ذكر,أنثى'],
            'job' => ['required', 'string', 'max:255'],
            'avatar' => ['required' , 'image'],
            'country' => ['required', 'string' , 'max:60'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.Instructor::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $instructor = Instructor::create([
            'name' => $request->name,
            'email' => $request->email,
            'job' => $request->job,
            'gender' => $request->gender,
            'avatar' => $request->file('avatar')->hashName(),
            'description' => $request->description,
            'country' => $request->country,
            'password' => Hash::make($request->password),
        ]);
        $request->file('avatar')->storeAs('avatars/instructors/' . $instructor->id . '/' , $request->file('avatar')->hashName());
        event(new Registered($instructor));


        return to_route('instructor.login');
    }
}
