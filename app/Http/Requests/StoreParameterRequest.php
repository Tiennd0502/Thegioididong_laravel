<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreParameterRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'bail|required|min:2|max:50',
            'value' => 'bail|required|min:2|max:100'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên!',
            'name.min' => 'Vui lòng nhập ít nhất 2 kí tự!',
            'name.max' => 'Vui lòng nhập ít hơn 50 kí tự !',
            'value.required' => 'Vui lòng nhập giá trị!',
            'value.min' => 'Vui lòng nhập ít nhất 2 kí tự!',
            'value.max' => 'Vui lòng nhập ít hơn 100 kí tự !',
        ];
    }
}
