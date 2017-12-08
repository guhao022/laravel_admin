<?php
/**
 * Created by PhpStorm.
 * User: code
 * Date: 2017/9/14
 * Time: 下午5:45
 */

namespace Modules\Admin\Controllers;

use Illuminate\Http\Request;
use Modules\Admin\Models\Users;

class UsersController extends Controller {

    public function __construct() {
        parent::__construct();
    }


    public function getsetting($uid) {
        $user = Users::find($uid);
        return view("admin::user.setting", ['user'=>$user]);
    }

    public function postsetting($uid, Request $request) {
        $user = Users::find($uid);
        $name = $request->input("name");

        $user->name = $name;

        if ($user->save()) {
            return true;
        }
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