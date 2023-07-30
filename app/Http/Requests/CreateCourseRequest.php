<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCourseRequest extends FormRequest
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
        return [
            'name' => ['required', 'string', 'max:255'],
            'department_id' => ['required', 'exists:departments,id'],
            'trailer' => ['required' , 'string'],
            'thumbinal' => ['required' , 'string'],
            'is_paid' => ['required', 'boolean'],
            'price' => ['required_if:is_paid,true','sometimes' , 'nullable', 'numeric', 'digits_between:2,7'],
            'discount_price' => ['sometimes', 'nullable', 'numeric', 'digits_between:2,7'],
            'end_discount_date' => ['required_with:discount_price','sometimes','nullable', 'date', 'after:' . date('Y-m-d')],
            'start_date' => ['required', 'date', 'after_or_equal:' . date('Y-m-d')],
            'end_date' => ['required', 'date' , 'after_or_equal:start_date'],
            'target_audience' => ['required', 'string', 'max:3000'],
            'outputs' => ['required', 'string', 'max:3000'],
            'references' => ['required', 'string', 'max:3000'],
            'description' => ['required', 'string', 'max:1000'],
            'curriculum' => ['required', 'string', 'max:3000'],
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'الاسم',
            'department_id' => 'قسم المادة',
            'is_paid' => 'مدفوع',
            'trailer' => 'العرض التعريفى بالمادة',
            'thumbinal' => 'الصورة التوضيحية للمادة',
            'price' => 'السعر',
            'discount_price' => 'السعر بعد الخصم',
            'end_discount_date' => 'تاريخ انتهاء الخصم',
            'start_date' => 'تاريخ بداية المادة',
            'end_date' => 'تاريخ نهاية المادة',
            'target_audience' => 'الفئة المستهدفة',
            'outputs' => 'المخرجات',
            'curriculum' => 'المنهج',
            'references' => 'المراجع',
            'description' => 'الوصف',
        ];
    }
}
