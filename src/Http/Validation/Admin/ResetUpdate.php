<?php

namespace Modules\Admin\Validation\Admin;

use Modules\Admin\Validation\Validator;

class ResetUpdate extends Validator
{

    public function rules()
    {

        return [
            'old_password'=>'required',
            'password'=>'required|confirmed|min:6',
        ];

    }

    public function messages()
    {
        return [
            'old_password.required' => '旧不能为空',
            'password.required' => '新密码不能为空',
            'password.confirmed'  => '两次输入不一致',
            'password.min'  => '密码最少6个字符',
        ];
    }
}
