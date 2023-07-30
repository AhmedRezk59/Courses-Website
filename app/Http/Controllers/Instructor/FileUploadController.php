<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class FileUploadController extends Controller
{
    public function upload_video(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'trailer' => ['required', 'mimes:mp4,mov,ogg,mkv,flv,wmv,m3u8']
            ]
        );
        if ($validator->fails()) {
            return response($validator->errors(), 422);
        }
        $files = $request->allFiles();

        if (count($files) > 1) {
            abort(422, 'Only 1 file can be uploaded at a time.');
        }


        $requestKey = array_key_first($files);


        $file = is_array($request->input($requestKey))
            ? $request->file($requestKey)[0]
            : $request->file($requestKey);

        return $file->store(
            path: 'tmp/' . now()->timestamp . '-' . Str::random(20)
        );
    }
    public function upload_image(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'thumbinal' => ['required', 'image']
            ]
        );
        if ($validator->fails()) {
            return response($validator->errors(), 422);
        }
        $files = $request->allFiles();
        if (empty($files)) {
            abort(422, 'No files were uploaded.');
        }

        $requestKey = array_key_first($files);


        $file = is_array($request->input($requestKey))
            ? $request->file($requestKey)[0]
            : $request->file($requestKey);

        return $file->store(
            path: 'tmp/' . now()->timestamp . '-' . Str::random(20)
        );
    }
    public function upload_avatar(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'avatar' => ['required', 'image']
            ]
        );
        if ($validator->fails()) {
            return response($validator->errors(), 422);
        }
        $files = $request->allFiles();
        if (empty($files)) {
            abort(422, 'No files were uploaded.');
        }

        $requestKey = array_key_first($files);


        $file = is_array($request->input($requestKey))
            ? $request->file($requestKey)[0]
            : $request->file($requestKey);

        return $file->store(
            path: 'tmp/' . now()->timestamp . '-' . Str::random(20)
        );
    }

    public function upload_lesson(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'video' => ['required', 'mimes:mp4,mov,ogg,mkv,flv,wmv,m3u8']
            ]
        );
        if ($validator->fails()) {
            return response($validator->errors(), 422);
        }
        $files = $request->allFiles();
        if (empty($files)) {
            abort(422, 'No files were uploaded.');
        }

        $requestKey = array_key_first($files);


        $file = is_array($request->input($requestKey))
            ? $request->file($requestKey)[0]
            : $request->file($requestKey);

        return $file->store(
            path: 'tmp/' . now()->timestamp . '-' . Str::random(20)
        );
    }

    public function upload_attachment(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'attachment' => ['required', 'mimes:pptx,pdf']
            ]
        );
        if ($validator->fails()) {
            return response($validator->errors(), 422);
        }
        $files = $request->allFiles();
        if (empty($files)) {
            abort(422, 'No files were uploaded.');
        }

        $requestKey = array_key_first($files);


        $file = is_array($request->input($requestKey))
            ? $request->file($requestKey)[0]
            : $request->file($requestKey);

        return $file->storeAs(
            path: 'tmp/' . now()->timestamp . '-' . Str::random(20),
            name: $file->getClientOriginalName()
        );
    }
}
