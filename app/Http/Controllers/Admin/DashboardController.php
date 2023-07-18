<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Instructor;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return to_route('admin.courses');
    }

    public function users()
    {
        return view('admin.users');
    }
    
    public function admins()
    {
        return view('admin.admins');
    }

    public function instructors()
    {
        $instructors = Instructor::select(['name' , 'email'])->paginate(10);
        return view('admin.instructors' , compact('instructors'));
    }
    
    public function courses($status = null)
    {
        return view('admin.courses' , compact('status'));
    }
}
