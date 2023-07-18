<?php

namespace App\Http\Controllers\Instructor;

use App\Enums\CourseStatus;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return to_route('instructor.courses.status' , CourseStatus::ACCEPTED);
    }

    public function courses($status = null)
    {
        return view('instructor.courses' , ['status' => $status]);
    }
}
