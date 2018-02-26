<?php

namespace Modules\Admin\Validation\Permission;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class Update extends FormRequest
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
        $id = Request::segment(4);

        $rules = [
            //
            'display_name'=>'required|max:20|unique:admin_permissions,display_name,'.$id,
            'pid'=>'required',
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'display_name.required'  => '权限显示名称不能为空',
            'display_name.unique'  => '权限名称已经存在',
            'display_name.max'  => '权限名最长为20个字符',
            'pid.required'  => '分类不能为空',
        ];
    }
}
