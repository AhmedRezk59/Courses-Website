<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Instructor;
use App\Models\Lesson;
use App\Models\User;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StreamController extends Controller
{
    public function getVideo(Course $course)
    {
        abort_if($course->instructor_id !== auth()->guard('instructor')->user()->id, 403);
        $path = Storage::path("courses/{$course->id}/{$course->trailer}");
        if (file_exists($path)) {
            return response()->download($path, null, [], null);
        } else {
            throw new FileNotFoundException('This file doesn\'t exist');
        }
    }

    public function getLesson(Lesson $lesson)
    {
        $dir = $lesson->directory;
        $course = $dir->course;
        abort_if($course->instructor_id !== auth()->guard('instructor')->user()->id, 403);
        $path = Storage::path("courses/{$course->id}/{$dir->id}/{$lesson->video}");
        if (file_exists($path)) {
            return response()->download($path, null, [], null);
        } else {
            throw new FileNotFoundException('This file doesn\'t exist');
        }
    }
    
    public function getLessonForUser(Lesson $lesson)
    {
        $dir = $lesson->directory;
        $course = $dir->course;
        abort_if(!auth()->user()->own($course->id), 403);
        $path = Storage::path("courses/{$course->id}/{$dir->id}/{$lesson->video}");
        if (file_exists($path)) {
            return response()->download($path, null, [], null);
        } else {
            throw new FileNotFoundException('This file doesn\'t exist');
        }
    }
    public function getImage(Course $course)
    {
        abort_if($course->instructor_id !== auth()->guard('instructor')->user()->id, 403);
        $path = Storage::path("courses/{$course->id}/{$course->thumbinal}");
        if (file_exists($path)) {
            return response()->download($path, null, [], null);
        } else {
            throw new FileNotFoundException('This file doesn\'t exist');
        }
    }

    public function getuserAvatar(User $user)
    {
        $path = Storage::path("avatars/users/{$user->id}/{$user->avatar}");
        if (file_exists($path)) {
            return response()->download($path, null, [], null);
        } else {
            throw new FileNotFoundException('This file doesn\'t exist');
        }
    }
    public function getThumbinal(Course $course)
    {
        $path = Storage::path("courses/{$course->id}/{$course->thumbinal}");
        if (file_exists($path)) {
            return response()->download($path, null, [], null);
        } else {
            throw new FileNotFoundException('This file doesn\'t exist');
        }
    }
    public function getInstructorAvatar(Instructor $instructor)
    {
        $path = Storage::path("avatars/instructors/{$instructor->id}/{$instructor->avatar}");
        if (file_exists($path)) {
            return response()->download($path, null, [], null);
        } else {
            throw new FileNotFoundException('This file doesn\'t exist');
        }
    }

    public function getLessonForAdmin(Lesson $lesson)
    {
        $dir = $lesson->directory;
        $course = $dir->course;
        abort_if(!auth()->guard('admin')->check(), 403);
        $path = Storage::path("courses/{$course->id}/{$dir->id}/{$lesson->video}");
        if (file_exists($path)) {
            return response()->download($path, null, [], null);
        } else {
            throw new FileNotFoundException('This file doesn\'t exist');
        }
    }

    public function getCourseTrailer(Course $course)
    {
        $path = Storage::path("courses/{$course->id}/{$course->trailer}");
        
        if (file_exists($path)) {
            return response()->download($path, null, [], null);
        } else {
            throw new FileNotFoundException('This file doesn\'t exist');
        }
    }
    public function getCourseThumbinal(Course $course)
    {
        $path = Storage::path("courses/{$course->id}/{$course->thumbinal}");
        if (file_exists($path)) {
            return response()->download($path, null, [], null);
        } else {
            throw new FileNotFoundException('This file doesn\'t exist');
        }
    }
}
