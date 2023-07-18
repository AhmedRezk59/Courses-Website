<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateDirectoryRequest;
use App\Http\Requests\UpdateDirectoryRequest;
use App\Models\Course;
use App\Models\Directory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DirectoryController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Course $course)
    {
        abort_if(auth()->guard('instructor')->user()->id != $course->instructor_id, 403);
        return view('instructor.directories.create_directory', ['course' => $course]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateDirectoryRequest $request, Course $course)
    {
        $course->directories()->create($request->validated());
        session()->flash('msg', 'تم إنشاء العنوان الرئيسى بنجاح');
        return to_route('instructor.courses.show', $course->id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Directory  $directory
     * @return \Illuminate\Http\Response
     */
    public function edit(Directory $directory)
    {
        abort_if(auth()->guard('instructor')->user()->id != $directory->course->instructor_id, 403);
        return view('instructor.directories.edit_directory', ['directory' => $directory]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Directory  $directory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDirectoryRequest $request, Directory $directory)
    {
        $directory->update($request->validated());
        session()->flash('msg', 'تم تعديل العنوان الرئيسى بنجاح');
        return to_route('instructor.directories.edit',  $directory->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Directory  $directory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Directory $directory)
    {
        abort_if(auth()->guard('instructor')->user()->id != $directory->course->instructor_id, 403);
        $directory->delete();
        Storage::deleteDirectory("courses/{$directory->course_id}/{$directory->id}");
        session()->flash('msg', 'تم حذف العنوان الرئيسى بنجاح');
        return to_route('instructor.courses.show', $directory->course->id);
    }
}
