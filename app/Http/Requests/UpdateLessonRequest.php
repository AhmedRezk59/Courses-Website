<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLessonRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->guard('instructor')->user()->id == $this->lesson->directory->course->instructor_id;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'video' => ['sometimes', 'nullable', 'string'],
            'attachment' => ['sometimes', 'nullable', 'string'],
            
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'الإسم',
            'video' => 'ملف الفيديو',
            'attachment' => 'المرفق'
        ];
    }
    
}
