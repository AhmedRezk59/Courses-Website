<?php

namespace App\Http\Controllers\Instructor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jobs\SendNewAnnouncementAddedEmail;
use App\Mail\NewAnnouncementAddedMail;
use App\Models\Announcement;
use App\Models\Course;
use Illuminate\Support\Facades\Mail;

class AnnouncementController extends Controller
{
    public function create(Course $course)
    {
        return view('instructor.announcements.create', compact('course'));
    }
    public function store(Request $request, Course $course)
    {
        $request->validate([
            'announcement' => 'required|string|max:3000'
        ], [], [
            'announcement' => 'التنويه'
        ]);
        $announcement = Announcement::create([
            'course_id' => $course->id,
            'body' => $request->announcement
        ]);
        $users = $course->users()->where('inquiry_mailable', true)->pluck('email');
        if($users->count() > 0){
            dispatch(new SendNewAnnouncementAddedEmail($announcement , $course , $users));
        }
        return back()->with('msg', 'تم إضافة التنويه بنجاح');
    }
}
