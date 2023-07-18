<?php

namespace App\Http\Controllers;

use App\Enums\CourseStatus;
use App\Models\Course;
use Illuminate\Http\Request;

class MainPageController extends Controller
{
    public function index()
    {
        $courses_count = Course::where('status' , CourseStatus::ACCEPTED->value)->count();
        $upcoming_courses = Course::where('status', CourseStatus::ACCEPTED->value)->where('start_date' , '>' , now()->toDateString())->with(['department' , 'instructor'])->limit(6)->get();
        $current_courses = Course::where('status', CourseStatus::ACCEPTED->value)->where('start_date' , '<=' , now()->toDateString())->where('end_date' ,'>=',now()->toDateString() )->with(['department' , 'instructor'])->limit(6)->get();
        return view('user.main-page',compact('courses_count', 'upcoming_courses' , 'current_courses'));
    }
}
