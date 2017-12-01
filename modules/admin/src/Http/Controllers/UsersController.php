<?php
/**
 * Created by PhpStorm.
 * User: code
 * Date: 2017/9/14
 * Time: 下午5:45
 */

namespace Modules\Admin\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller {

    public function __construct() {
        parent::__construct();
    }

    public function register() {
        $code = Request::input("code");
        $phone = Request::input("phone");
        $password = Request::input("password");

        $has = Users::where("phone", $phone)->count();

        if ($has) {
            return "<script>window.alert('手机号已注册'); window.location.href='/';</script>";
        }

        /*if (!Session::has("code".$phone)) {
            return "<script>window.alert('验证码不正确'); window.location.href='/';</script>";
        }

        $se_code = Session::get("code".$phone);

        if ($se_code != $code) {
            return "<script>window.alert('验证码不正确'); window.location.href='/';</script>";
        }*/

        $user = new Users();

        $user->username = $phone;
        $user->phone = $phone;
        $user->password = bcrypt($password);

        if ($user->save()) {
            Auth::guard("admin")->attempt(['phone' => $phone, 'password' => $password]);
            return redirect("/");
        } else {
            return "<script>window.alert('注册失败'); window.location.href='/';</script>";
        }

    }

    public function login() {

        $credentials = Request::only(['phone', 'password']);

        $validator = Validator::make($credentials, [
            'phone' => 'required', 'password' => 'required',
        ]);

        if ($validator->fails()) {
            return "<script>window.alert('登录失败'); window.location.href='/';</script>";
        }

        if (Auth::guard("hive")->attempt($credentials)) {
            return redirect('/');
        }
        return "<script>window.alert('登录失败'); window.location.href='/';</script>";

    }

    public function center() {

        if (empty(Hive::user())) {
            return "<script>window.alert('用户未登录'); window.location.href='/';</script>";
        }

        $uid = Hive::user()->id;

        $vip = Vip::where("uid", $uid)->where("start", "<=", date("Y-m-d H:i:s"))->where("end", ">=", date("Y-m-d H:i:s"))->first();

        $is_vip = 0;
        if ($vip) {
            $is_vip = 1;
        }

        $degree = Degree::all();

        $content = Content::where("uid", $uid)->get();

        $operate = Operate::with("content")->where("uid", $uid)->get();

        $follow = Follow::with("follow")->where("uid", $uid)->get();

        $fans = Follow::with("fans")->where("follow_id", $uid)->get();

        return view("hive::user.center", [
            "degree"=>$degree,
            "vip"=>$is_vip,
            "content"=>$content,
            "operate"=>$operate,
            "follow"=>$follow,
            "fans"=>$fans,
        ]);
    }

    public function edit() {
        $phone = Request::input("phone");
        $nickname = Request::input("nickname");
        $gender = Request::input("gender");
        $b_year = Request::input("b_year");
        $b_month = Request::input("b_month");
        $b_day = Request::input("b_day");
        $birthday = $b_year."-".$b_month."-".$b_day;
        $degree = Request::input("degree");
        $school = Request::input("school");
        $bank_card = Request::input("bank_card");

        $user = Users::find(Hive::user()->id);

        $user->phone = $phone;
        $user->nickname = $nickname;
        $user->gender = $gender;
        $user->birthday = $birthday;
        $user->degree = $degree;
        $user->school = $school;
        $user->bank_card = $bank_card;
        $user->save();

        if (!empty(Request::input("password"))) {
            $old_password = Request::input("old_password");
            $password = Request::input("password");
            $pswordc = Request::input("pswordcf");

            if (Hash::check($old_password, $user->password)) {
                if ($password != $pswordc) {
                    return "<script>window.alert('密码两次输入不一致'); window.location.href='/user/center';</script>";
                }
                $user->password = bcrypt($password);
                $user->save();
            } else {
                return "<script>window.alert('旧密码不正确'); window.location.href='/user/center';</script>";
            }
        }

        return "<script> window.location.href='/user/center';</script>";

    }

    public function follow($fid) {
        if (empty(Hive::user())) {
            return response()->json([
                'code'=>500,
                'msg'=>'请登录',
            ]);
        }
        $uid = Hive::user()->id;
        if ($uid == $fid) {
            return response()->json([
                'code'=>500,
                'msg'=>'你不能关注自己',
            ]);
        }

        $is_follow = Follow::where("uid", $uid)->where("follow_id", $fid)->count();
        if ($is_follow > 0) {
            return response()->json([
                'code'=>500,
                'msg'=>'请不要重复关注',
            ]);
        }

        $follow = new Follow();
        $follow->uid = $uid;
        $follow->follow_id = $fid;
        if ($follow->save()) {

            $notice = new Notice();
            $notice->uid = $fid;
            $notice->notice = json_encode([
                "uid" => $fid,
                'msg' => "关注了你"
            ]);
            $notice->type = 2;
            $notice->save();

            return response()->json([
                'code'=>0,
                'msg'=>'关注成功',
            ]);
        };
    }

    public function non_follow($fid) {
        if (empty(Hive::user())) {
            return response()->json([
                'code'=>500,
                'msg'=>'请登录',
            ]);
        }
        $uid = Hive::user()->id;

        $follow = Follow::where("uid", $uid)->where("follow_id", $fid)->delete();
        if ($follow) {

            $notice = new Notice();
            $notice->uid = $fid;
            $notice->notice = json_encode([
                "uid" => $fid,
                'msg' => "取消了关注"
            ]);
            $notice->type = 2;
            $notice->save();

            return response()->json([
                'code'=>0,
                'msg'=>'取消成功',
            ]);
        };
    }

    public function vip() {
        return view("hive::user.vip");
    }

    public function avatar() {

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
    }

    public function content($id) {
        $content = Content::find($id);
        $content->view_count += 1;
        $content->save();
        $user = Users::with("deg")->where("id", $content->uid)->first();

        $is_follow = 0;
        if (!empty(Hive::user())) {
            $is_follow = Follow::where("uid", Hive::user()->id)->where("follow_id", $content->uid)->count();
        }

        $is_collect = 0;
        if (!empty(Hive::user())) {
            $is_collect = Operate::where("uid", Hive::user()->id)->where("content_id", $content->id)->where("type", 2)->count();
        }

        $vip = 0;

        if (!empty(Hive::user())) {
            if ($content->uid == Hive::user()->id) {
                $is_follow = 1;
                $is_collect = 1;
            }

            $vip = Vip::where("uid", Hive::user()->id)->where("start", "<=", date("Y-m-d H:i:s"))->where("end", ">=", date("Y-m-d H:i:s"))->count();;
        }


        $ctitle = Content::where("uid", $id)->where("examine", 2)->orderBy("created_at", "desc")->select('id',"title")->take(4)->get();
        return view("hive::user.content",[
            'user' => $user,
            'is_follow' => $is_follow,
            'is_collect' => $is_collect,
            'vip' => $vip,
            'content' => $content,
            'ctitle' => $ctitle
        ]);
    }

    public function notice() {
        if (empty(Hive::user())) {
            return "<script>window.alert('用户未登录'); window.location.href='/';</script>";
        }
        $notice = Notice::where("uid", Hive::user()->id)->orderBy("id", "desc")->get();

        foreach ($notice as &$n) {
            $msg = json_decode($n->notice);
            $user = Users::find($msg->uid);
            $vip = Vip::where("uid", $msg->uid)->where("start", "<=", date("Y-m-d H:i:s"))->where("end", ">=", date("Y-m-d H:i:s"))->count();
            $user->vip = $vip;
            $n->user = $user;
            $n->msg = $msg->msg;

        }

        return view('hive::user.notice', ['notice' => $notice]);
    }
}