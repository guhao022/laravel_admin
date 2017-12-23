<?php

namespace Modules\Admin\Validation\Admin;

use Illuminate\Http\Request;
use Modules\Admin\Validation\Validator;

class Update extends Validator
{

    public function rules()
    {
        $id = Request::segment(3);

        $rules = [
            'name'=>'required|max:20|unique:admin_user,name,'.$id,
        ];

        if (Request::filled('password')) {
            $rules['password'] = 'confirmed|min:6';
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'name.required' => '用户名不能为空',
            'name.unique'  => '用户名已经存在',
            'name.max'  => '用户名最长为20个字符',
            'password.confirmed'  => '两次输入不一致',
            'password.min'  => '密码最少6个字符',
            'role_ids.required'  => '请选择权限',
            'role_ids.array'  => '权限格式错误',
        ];
    }
}
