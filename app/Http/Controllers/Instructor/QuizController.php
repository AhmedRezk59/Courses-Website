<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function create(Course $course)
    {
        return view('instructor.quiz.final_quiz',compact('course'));
    }
}
