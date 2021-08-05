<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePermissionRequest extends FormRequest
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
            'module_parent' => 'bail|required|unique:permissions,name,'.$this->id,
            'module_child' => 'bail|required'
        ];
    }
    public function messages()
    {
        return [
            'module_parent.required' => 'Vui lòng chọn module!',
            'module_parent.unique' => 'Module đã tồn tại !',
            'module_child.required' => 'Vui lòng chọn module!'
        ];
    }
}
