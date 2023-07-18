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
            'questions' => ['required', 'array', 'min:1'],
            'questions.*.body' => ['required', 'string', 'max:255'],
            'questions.*.answers' => ['required', 'array', 'min:2'],
            'questions.*.answers.*.body' => ['required', 'string', 'max:255'],
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'الإسم',
            'video' => 'ملف الفيديو',
            'answers' => 'الإجابات',
            'questions' => 'الأسئلة',
            'questions.*.body' => 'عنوان السؤال',
            'questions.*.answers.*.body' => 'الإجابة',
        ];
    }
    public function messages()
    {
        return [
            'questions.*.answers' => 'يجب أن يكون إجابتان لكل سؤال على الأقل',
        ];
    }
}
