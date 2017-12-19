<?php

namespace Modules\Admin\Validation\Role;

use Modules\Admin\Validation\Validator;

class Create extends Validator
{

    public function rules()
    {
        return [
            'name'=>'required|unique:admin_roles',
            'display_name'=>'required|max:20|unique:admin_roles',
            'permission_ids'=>'required|array'
        ];
    }

    public function messages()
    {
        return [
            'name.required'  => '角色标识不能为空',
            'name.unique'  => '角色标识已经存在',
            'display_name.required'  => '角色显示名称不能为空',
            'display_name.unique'  => '角色已经存在',
            'display_name.max'  => '角色名最长为20个字符',
            'permission_ids.required'  => '请选择角色权限',
            'permission_ids.array'  => '权限选择不正确',
        ];
    }
}
