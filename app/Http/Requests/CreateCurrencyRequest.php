<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCurrencyRequest extends FormRequest
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
            'name' => ['required', 'string', 'unique:currencies,name', 'max:55'],
            'code' => ['required', 'string', 'unique:currencies,code', 'max:10'],
            'rate' => ['required', 'numeric', 'digits_between:2,5']
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'الإسم',
            'code' => 'رمز العملة',
            'rate' => 'ثمن العملة بالدولار االأمريكى'
        ];
    }
}
