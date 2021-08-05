<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRoleREquest extends FormRequest
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

    public function rules()
    {
        return [
            'name' => 'bail|required|min:2|max:50|unique:roles,name,'.$this->id,
            'display_name' => 'bail|required|min:5|max:255',
            'permission_id' => 'bail|required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên!',
            'name.min' => 'Vui lòng nhập ít nhất 2 kí tự!',
            'name.max' => 'Vui lòng nhập ít hơn 50 kí tự !',
            'name.unique' => 'Tên vai trò đã tồn tại !',
            'display_name.required' => 'Vui lòng nhập mô tả !',
            'display_name.min' => 'Vui lòng nhập ít nhất 5 kí tự!',
            'display_name.max' => 'Vui lòng nhập ít hơn 255 kí tự !',
            'permission_id.required' => 'Vui lòng chọn quyền !'
        ];
    }
}
