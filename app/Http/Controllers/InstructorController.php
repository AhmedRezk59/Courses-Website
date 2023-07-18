<?php

namespace App\Http\Controllers;

use App\Enums\CourseStatus;
use App\Models\Instructor;
use Illuminate\Http\Request;

class InstructorController extends Controller
{
    public function show($id)
    {
        $instructor = Instructor::where('id' , $id)->with(['courses' => function($q){
            $q->where('status' , CourseStatus::ACCEPTED->value);
        }])->first();
        return view('user.instructor_page' , compact('instructor'));
    }
}
