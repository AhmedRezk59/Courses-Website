<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateInstructorProfileRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function show()
    {
        return view('instructor.profile');
    }

    public function update(UpdateInstructorProfileRequest $request)
    {
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'job' => $request->job,
            'gender' => $request->gender,
            'description' => $request->description,
            'country' => $request->country,
        ];
        if (isset($request->avatar)) {
            $data['avatar'] = $request->file('avatar')->hashName();
            $request->file('avatar')->store('avatars/instructors/' . auth()->guard('instructor')->user()->id . '/');
            $path = 'avatars/instructors/' . auth()->guard('instructor')->user()->id . '/' . auth()->guard('instructor')->user()->avatar;
            if(Storage::exists($path)){
                Storage::delete($path);
            }
        }
        if (isset($request->password)) {
            $data['password'] = Hash::make($request->password);
        }
        auth()->guard('instructor')->user()->update($data);
        return back()->with('msg', 'تم تحديث البيانات بنجاح');
    }
}
