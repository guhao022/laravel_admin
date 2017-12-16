<?php

namespace Modules\Admin\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminCreateRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email'=>'required|email|unique:admin_user',
            'name'=>'required|unique:admin_user|max:20',
            'password'=>'required|confirmed',
            'password_confirmation'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => '登录邮箱不能为空',
            'email.email' => '邮箱格式错误',
            'email.uinque' => '登录邮箱已经存在',
            'name.required' => '用户名不能为空',
            'name.unique'  => '用户名已经存在',
            'name.max'  => '用户名最长为20个字符',
            'password.required'  => '密码不能为空',
            'password.confirmed'  => '密码输入不一致',
            'password_confirmation.required'  => '验证密码不能为空',
        ];
    }
}
