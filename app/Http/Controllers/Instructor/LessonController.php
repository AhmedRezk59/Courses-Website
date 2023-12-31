<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateLessonRequest;
use App\Http\Requests\UpdateLessonRequest;
use App\Models\Course;
use App\Models\Directory;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use Illuminate\Support\Facades\DB;

class LessonController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Course $course, Directory $directory)
    {
        abort_if(auth()->guard('instructor')->user()->id != $course->instructor_id, 403);
        return view('instructor.lessons.create_lesson', compact('course', 'directory'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateLessonRequest $request, Course $course, Directory $directory)
    {
        abort_if(auth()->guard('instructor')->user()->id != $course->instructor_id, 403);
        $lessonVideoInfo = pathinfo(Storage::path($request->validated()['video']));

        $videoFileLocation = Storage::putFile(
            path: 'courses/' . $course->id . '/' . $directory->id,
            file: new File(Storage::path($request->validated()['video']))
        );
        Storage::deleteDirectory(rtrim($request->validated()['video'], $lessonVideoInfo['basename']) . DIRECTORY_SEPARATOR);


        $lesson = $directory->lessons()->create([
            ...$request->validated(),
            'video' => ltrim($videoFileLocation, "courses/{$course->id}/ $directory->id/"),
        ]);

        if (isset($request->attachment)) {
            $attachmentInfo = pathinfo(Storage::path($request->validated()['attachment']));
            $attachmentFileLocation = Storage::putFile(
                path: 'courses/' . $course->id . '/' . $directory->id,
                file: new File(Storage::path($request->validated()['attachment'])),
            );
            $lesson->attachment()->create([
                'name' => $attachmentInfo['basename'],
                'path' => ltrim($attachmentFileLocation, "courses/{$course->id}/ $directory->id/")
            ]);
            Storage::deleteDirectory(rtrim($request->validated()['attachment'], $attachmentInfo['basename'] . DIRECTORY_SEPARATOR));
        }

        foreach ($request->questions as $q) {
            $question = $lesson->questions()->create([
                'body' => $q['body']
            ]);
            foreach ($q['answers'] as $a) {
                $question->answers()->create([
                    'body' => $a['body'],
                    'correct' => isset($a['correct']) && $a['correct'] == 1 ? true : false
                ]);
            }
        }
        DB::table('course_user')->where('course_id', $course->id)->update([
            'is_completed' => false
        ]);
        session()->flash('msg', 'تم إنشاء الدرس بنجاح');
        return to_route('instructor.courses.show', $course->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function show(Lesson $lesson)
    {
        abort_if(auth()->guard('instructor')->user()->id != $lesson->directory->course->instructor_id, 403);
        return view('instructor.lessons.show_lesson', compact('lesson'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function edit(Lesson $lesson)
    {
        abort_if(auth()->guard('instructor')->user()->id != $lesson->directory->course->instructor_id, 403);
        $directory = $lesson->directory;
        $course = $directory->course;
        return view('instructor.lessons.edit_lesson', compact('lesson', 'directory', 'course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLessonRequest $request, Lesson $lesson)
    {
        $dir = $lesson->directory;
        $course = $dir->course;
        $validated = array_filter($request->validated());

        if (isset($validated['video']) && strlen($validated['video']) > 0) {
            Storage::delete("courses/{$course->id}/{$dir->id}/{$lesson->video}");
            $videoFileLocation = Storage::putFile(
                path: "courses/{$course->id}/{$dir->id}",
                file: new File(Storage::path($validated['video']))
            );
            $video = pathinfo($validated['video']);
            Storage::deleteDirectory($video['dirname']);
            $validated['video'] = ltrim($videoFileLocation, "courses/{$course->id}/{$dir->id}/");
        }

        if (isset($request->attachment)) {
            $attachmentInfo = pathinfo(Storage::path($request->validated()['attachment']));
            $attachmentFileLocation = Storage::putFile(
                path: 'courses/' . $course->id . '/' . $dir->id,
                file: new File(Storage::path($request->validated()['attachment'])),
            );
            $attachment  = $lesson->attachment;
            if (isset($attachment)) {
                $attachment->delete();
                Storage::delete("courses/{$course->id}/{$dir->id}/{$attachment->path}");
            }
            $lesson->attachment()->create([
                'name' => $attachmentInfo['basename'],
                'path' => ltrim($attachmentFileLocation, "courses/{$course->id}/ $dir->id/")
            ]);
            Storage::deleteDirectory(rtrim($request->validated()['attachment'], $attachmentInfo['basename'] . DIRECTORY_SEPARATOR));
        }


        $lesson->update($validated);
        session()->flash('msg', 'تم تعديل الدرس بنجاح');
        return to_route('instructor.lessons.show', $lesson);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lesson $lesson)
    {
        abort_if(auth()->guard('instructor')->user()->id != $lesson->directory->course->instructor_id, 403);
        $directory = $lesson->directory;
        $attachment = $lesson->attachment->path;
        $lesson->delete();
        Storage::delete("courses/{$directory->course_id}/{$directory->id}/{$lesson->video}");
        Storage::delete("courses/{$directory->course_id}/{$directory->id}/{$attachment}");
        session()->flash('msg', 'تم حذف الدرس بنجاح');
        return to_route('instructor.courses.show', $directory->course);
    }
}
