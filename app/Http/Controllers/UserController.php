<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function userPage($user = null)
    {
        if(isset($user)){
            $user = User::find($user);
        }else {
            $user = auth()->user();
        }
        $courses = $user->courses()->with(['department' , 'instructor'])->get();
        return view('user.user_page' , compact('courses','user'));
    }
}
