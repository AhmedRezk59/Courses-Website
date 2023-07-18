<?php

namespace App\Http\Requests;

use App\Models\Instructor;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;

class UpdateInstructorProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return
            [
                'name' => ['required', 'string', 'max:255'],
                'description' => ['required', 'string', 'max:3000'],
                'gender' => ['required', 'string', 'in:ذكر,أنثى'],
                'job' => ['required', 'string', 'max:255'],
                'avatar' => ['sometimes', 'nullable', 'image'],
                'country' => ['required', 'string', 'max:60'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:instructors,email,' .auth()->guard('instructor')->user()->id ],
                'password' => ['sometimes', 'nullable', 'confirmed', Rules\Password::defaults()],
            ];
    }
}
