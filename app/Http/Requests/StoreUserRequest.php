<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name' => 'bail|required|min:5|max:50|unique:users,name,'. $this->id,
            'email' => 'bail|required|email|unique:users,email,'. $this->id,
            'password' => 'bail|required|min:8'
        ];
    }
    public function messages()
    {
        return [
            'category_id.required' => 'Vui lòng chọn danh mục !',
            'name.required' => 'Vui lòng nhập tên!',
            'name.min' => 'Vui lòng nhập ít nhất 5 kí tự!',
            'name.max' => 'Vui lòng nhập ít hơn 50 kí tự !',
            'email.required' => 'Vui lòng nhập email!',
            'email.email' => 'Vui lòng nhập đúng định dạng email!',
            'email.unique' => 'Email đã tồn tại!',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'password.min' => 'Mật khẩu ít nhất 8 kí tự'
        ];
    }
}
