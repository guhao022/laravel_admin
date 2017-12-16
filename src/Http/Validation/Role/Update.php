<?php

namespace Modules\Admin\Validation\Role;

use Illuminate\Http\Request;
use Modules\Admin\Validation\Validator;

class Update extends Validator
{

    public function rules()
    {
        $id = Request::segment(3);

        return [
            'name'=>'required|unique:admin_roles,name,'.$id,
            'display_name'=>'required|max:20|unique:admin_roles,display_name,'.$id,
        ];

    }

    public function messages()
    {
        return [
            'name.required' => '角色标识不能为空',
            'name.unique'  => '角色标识已经存在',
            'display_name.required' => '角色名不能为空',
            'display_name.unique'  => '角色已经存在',
            'display_name.max'  => '角色名最长为20个字符',
        ];
    }
}
