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
            'email'=>'required|email|unique:admin_user,email,'.$id,
            'name'=>'required|max:20|unique:admin_user,name,'.$id,
            'role_ids'=>'required|array'
        ];

        if (Request::filled('password')) {
            $rules['password'] = 'confirmed|min:6';
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'email.required' => '登录邮箱不能为空',
            'email.email' => '邮箱格式错误',
            'email.unique' => '登录邮箱已经注册',
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
