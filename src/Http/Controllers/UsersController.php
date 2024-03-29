<?php
/**
 * Created by PhpStorm.
 * User: code
 * Date: 2017/9/14
 * Time: 下午5:45
 */

namespace Modules\Admin\Controllers;

use Modules\Admin\Models\AdminRoles;
use Modules\Admin\Models\AdminUser;
use Illuminate\Http\Request;

class UsersController extends Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index()
    {
        $admin = AdminUser::all();

        $roles = AdminRoles::all(['id','display_name']);

        return view('admin::user.index',['admin'=>$admin,'roles'=>$roles]);
    }

    /**
     * @name  个人信息设置
     * @param $uid
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getSetting($uid)
    {
        $user = AdminUser::find($uid);

        return view("admin::user.setting", ['user'=>$user]);
    }

    /**
     * @name 个人信息设置（提交）
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function postSetting(Request $request)
    {
        $uid = $request->input('uid');

        $user = AdminUser::find($uid);

        $email = $request->input("email");

        $user->email = $email;

        if ($user->save()) {
            return redirect(config('admin.route.prefix'));
        }
    }

    public function getSetPwd($uid) {

    }



    /*public function avatar() {

        $uid = Hive::user()->id;
        $user = Users::find($uid);

        if (!Request::hasFile('avatar') || !Request::file('avatar')->isValid()) {
            return response()->json(['code' => 500, 'msg'=>'头像图片文件无效']);
        }

        $avatar = Request::file("avatar");
        $avatarPath = public_path(config("hive.upload.path"))."/avatar/";
        $aname = str_random(16).".".$avatar->getClientOriginalExtension();
        if (!$avatar->move($avatarPath, $aname)) {
            return response()->json(['code' => 500, 'msg'=>'头像上传失败1']);
        }

        $avatar = "avatar/".$aname;
        $user->avatar = $avatar;

        if (!$user->save()) {
            return response()->json(['code' => 500, 'msg'=>'头像上传失败2']);
        }

        return response()->json(['code' => 0, 'data' =>$avatar, 'msg'=>'头像上传成功']);
    }*/
}