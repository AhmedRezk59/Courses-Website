<?php

namespace App\Http\Controllers\Instructor;

use App\Enums\CourseStatus;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $courses_ids = auth()->guard('instructor')->user()->courses()->where('status', CourseStatus::ACCEPTED->value)->pluck('id');
        $comments = Comment::where('is_read', false)->whereIn('course_id', $courses_ids)->where('parent_id', null)->paginate(10);
        return view('instructor.comments.comments_index', compact('comments'));
    }

    public function show($comment)
    {
        $comment = Comment::where('parent_id', null)->where('id', $comment)->with(['replies'])->first();
        
        return view('instructor.comments.comment_show', compact('comment'));
    }
    public function add(Request $request , $parent_id)
    {
        $request->validate([
            'body' => 'string|max:400'
        ]);
        $parent = Comment::where('id' , $parent_id)->first();
        $comment = Comment::create([
            'is_instructor' => true,
            'user_id' => auth()->guard('instructor')->user()->id,
            'body' => $request->body,
            'parent_id' => $parent->id,
            'course_id' => $parent->course_id,
            'lesson_id' =>$parent->lesson_id
        ]);
        $parent->update([
            'is_read' => true
        ]);
        return back()->with('msg' , 'تم إضافة التعليق');
    }
}
