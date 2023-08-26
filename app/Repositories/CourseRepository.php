<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Storage;
use App\Models\Course;
use Illuminate\Http\File;
use  Intervention\Image\Facades\Image;

class CourseRepository
{
    public function updateCourse($request, Course $course)
    {
        $validated = $request;
        $paths = [];

        if (isset($validated['trailer']) && strlen($validated['trailer']) > 0) {
            Storage::delete("courses/{$course->id}/{$course->trailer}");
            $videoFileLocation = Storage::putFile(
                path: 'courses/' . $course->id,
                file: new File(Storage::path($validated['trailer']))
            );
            $video = pathinfo($validated['trailer']);
            Storage::deleteDirectory($video['dirname']);
            $paths['trailer'] = ltrim($videoFileLocation , "courses/{$course->id}/");
        }else{
            unset($validated['trailer']);
        }

        if (isset($validated['thumbinal']) && strlen($validated['thumbinal']) > 0) {
            Storage::delete("courses/{$course->id}/{$course->thumbinal}");

            $image = pathinfo($validated['thumbinal']);

            Image::make(new File(Storage::path($validated['thumbinal'])))
                ->resize(1280, 720, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(Storage::path("courses/{$course->id}/{$image['basename']}"));

            Storage::deleteDirectory($image['dirname']);
            $paths['thumbinal'] = $image['basename'];
        } else {
            unset($validated['thumbinal']);
        }

        if (count($paths) > 0) {
            $validated = [...$validated, ...$paths];
        }
        $course->update($validated);

        return $course;
    }

    public function createCourse($request)
    {
        $course = Course::create($request->validated());
        $videoFileLocation = Storage::putFile(
            path: 'courses/' . $course->id,
            file: new File(Storage::path($request->validated()['trailer']))
        );


        $image = pathinfo($request->validated()['thumbinal']);

        Image::make(new File(Storage::path($request->validated()['thumbinal'])))
            ->resize(1280, 720, function ($constraint) {
                $constraint->aspectRatio();
            })->save(Storage::path("courses/{$course->id}/{$image['basename']}"));

        Storage::deleteDirectory($image['dirname']);

        $course->update([
            'trailer' => ltrim($videoFileLocation, "courses/{$course->id}/"),
            'thumbinal' => $image['basename'],
        ]);

        return $course;
    }
}
