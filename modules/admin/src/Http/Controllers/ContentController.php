<?php
/**
 * Created by PhpStorm.
 * User: code
 * Date: 2017/9/20
 * Time: 下午4:32
 */

namespace Modules\Admin\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Request;
use Modules\Hive\Facades\Hive;
use Modules\Hive\Models\Content;
use Modules\Hive\Models\Follow;
use Modules\Hive\Models\Operate;
use Modules\Hive\Models\Vip;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;

class ContentController extends Controller {

    public function __construct() {
        parent::__construct();
    }

    public function create() {
        $title = Request::input("title");
        if (!$title) {
            return "<script>window.alert('请输入标题'); window.location.href='/user/center';</script>";
        }
        $summary = Request::input("summary");
        if (!$summary) {
            return "<script>window.alert('请输入简介'); window.location.href='/user/center';</script>";
        }
        $content = Request::input("content");
        if (!$content) {
            return "<script>window.alert('请输入内容'); window.location.href='/user/center';</script>";
        }

        $keywords = Request::input("keywords");

        $m = new Content();
        $m->uid = Hive::user()->id;
        $m->title = $title;
        $m->summary = $summary;
        $m->keyword = $keywords;
        $m->content = $content;
        if ($m->save()) {
            return "<script>window.alert('添加成功'); window.location.href='/user/center';</script>";
        } else {
            return "<script>window.alert('添加失败'); window.location.href='/user/center';</script>";
        }
    }

    public function edit($id) {
        $title = Request::input("title");
        if (!$title) {
            return "<script>window.alert('请输入标题'); window.location.href='/user/center';</script>";
        }
        $summary = Request::input("summary");
        if (!$summary) {
            return "<script>window.alert('请输入简介'); window.location.href='/user/center';</script>";
        }
        $content = Request::input("content");
        if (!$content) {
            return "<script>window.alert('请输入内容'); window.location.href='/user/center';</script>";
        }

        $keywords = Request::input("keywords");

        $m = Content::find($id);
        $m->title = $title;
        $m->summary = $summary;
        $m->keyword = $keywords;
        $m->content = $content;
        if ($m->save()) {
            return "<script>window.alert('修改成功'); window.location.href='/user/center';</script>";
        } else {
            return "<script>window.alert('修改失败'); window.location.href='/user/center';</script>";
        }
    }

    public function info($id) {
        $content = Content::find($id);

        if ($content) {
            return response()->json(['code'=>0, 'data'=>$content, 'msg'=>'success']);
        } else {
            return response()->json(['code'=>500, 'msg'=>'查找失败']);
        }

    }

    public function search() {
        $key = Request::input("key");

        $content = Content::with("user")->where("title", "like", "%$key%")->orWhere("keyword", "like", "%$key%")->orWhere("content", "like", "%$key%")->orderBy("is_hot", "desc")->orderBy("comment_count", "desc")->orderBy("download_count", "desc")->orderBy("collect_count", "desc")->orderBy("view_count", "desc")->get();

        return view("hive::content.search", ["content" => $content, "key"=>$key]);
    }

    public function detail($id) {
        $content = Content::find($id);
        $content->view_count += 1;
        $content->save();

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
        return view("hive::content.detail", [
            'is_follow' => $is_follow,
            'is_collect' => $is_collect,
            'vip' => $vip,
            'content' => $content,
        ]);
    }

    public function download($id) {
        if (empty(Hive::user())) {
            return "<script>window.alert('用户未登录'); window.location.href='/';</script>";
        }

        $content = Content::find($id);

        $content->download_count += 1;
        $content->save();

        $is_op = Operate::where("uid", Hive::user()->id)->where("content_id", $content->id)->where("type", 1)->count();

        if($is_op == 0) {
            $op = new Operate();
            $op->uid = Hive::user()->id;
            $op->content_id = $content->id;
            $op->type = 1;
            $op->save();
        }

        $pdf = new \TCPDF();
        // 设置文档信息
        $pdf->SetCreator('蜂巢资料库');
        $pdf->SetTitle($content->title);
        $pdf->SetSubject($content->title);
        $pdf->SetKeywords($content->keyword);

        // 设置默认等宽字体
        $pdf->SetDefaultMonospacedFont('courier');

        // 设置间距
        $pdf->SetMargins(15, 15, 15);//页面间隔
        $pdf->SetHeaderMargin(5);//页眉top间隔
        $pdf->SetFooterMargin(10);//页脚bottom间隔

        // 设置分页
        $pdf->SetAutoPageBreak(true, 25);

        // set default font subsetting mode
        $pdf->setFontSubsetting(true);

        //设置字体 stsongstdlight支持中文
        $pdf->SetFont('stsongstdlight', '', 14);

        $pdf->AddPage();
        $pdf->writeHTML($content->content);

        //输出PDF
        $pdf->Output(pinyin_abbr($content->title).'.pdf', 'D');//I输出、D下载
    }

    public function collect($id) {
        if (empty(Hive::user())) {
            return response()->json([
                'code'=>500,
                'msg'=>'请登录',
            ]);
        }

        $content = Content::find($id);

        $content->collect_count += 1;
        $content->save();

        $is_op = Operate::where("uid", Hive::user()->id)->where("content_id", $content->id)->where("type", 2)->count();

        if($is_op > 0) {
            return response()->json([
                'code'=>500,
                'msg'=>'已收藏',
            ]);
        }

        $op = new Operate();
        $op->uid = Hive::user()->id;
        $op->content_id = $content->id;
        $op->type = 2;
        if($op->save()){
            return response()->json([
                'code'=>0,
                'msg'=>'收藏成功',
            ]);
        };
    }

}