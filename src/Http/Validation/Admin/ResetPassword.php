<?php

namespace Modules\Admin\Validation\Admin;

use Modules\Admin\Validation\Validator;

class ResetPassword extends Validator
{

    public function rules()
    {
        return [
            'password'=>'required|confirmed|min:6',
            'password_confirmation'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'password.required'  => '密码不能为空',
            'password.min'  => '密码最少6个字符',
            'password.confirmed'  => '两次输入不一致',
            'password_confirmation.required'  => '验证密码不能为空',
        ];
    }
}
