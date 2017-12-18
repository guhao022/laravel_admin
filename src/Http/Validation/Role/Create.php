<?php

namespace Modules\Admin\Validation\Role;

use Modules\Admin\Validation\Validator;

class Create extends Validator
{

    public function rules()
    {
        return [
            'display_name'=>'required',
            'permission_ids'=>'array'
        ];
    }

    public function messages()
    {
        return [
            'display_name.required'  => '角色显示名称不能为空',
            'permission_ids.array'  => '权限选择不正确',
        ];
    }
}
