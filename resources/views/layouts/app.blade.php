
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="keywords" content="fly,layui,前端社区">
    <meta name="description" content="Fly社区是模块化前端UI框架Layui的官网社区，致力于为web开发提供强劲动力">
    <link rel="stylesheet" href="{{ asset('layui/css/layui.css') }}">
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
</head>
<body>

@include('layouts.header')


<div class="main layui-clear">
    <div class="wrap">
        <div class="content">
            <div class="fly-tab fly-tab-index">
        <span>
          <a href="jie/index.html">全部</a>
          <a href="jie/index.html">未结帖</a>
          <a href="jie/index.html">已采纳</a>
          <a href="jie/index.html">精帖</a>
          <a href="user/index.html">我的帖</a>
        </span>
                <form action="http://cn.bing.com/search" class="fly-search">
                    <i class="iconfont icon-sousuo"></i>
                    <input class="layui-input" autocomplete="off" placeholder="搜索内容，回车跳转" type="text" name="q">
                </form>
                <a href="jie/add.html" class="layui-btn jie-add">发布问题</a>
            </div>



            <ul class="fly-list fly-list-top">
                <li class="fly-list-li">
                    <a href="user/home.html" class="fly-list-avatar">
                        <img src="http://tp4.sinaimg.cn/1345566427/180/5730976522/0" alt="">
                    </a>
                    <h2 class="fly-tip">
                        <a href="jie/detail.html">基于 layui的轻量级问答社区页面模版 V2版本</a>
                        <span class="fly-tip-stick">置顶</span>
                        <span class="fly-tip-jing">精帖</span>
                    </h2>
                    <p>
                        <span><a href="user/home.html">贤心</a></span>
                        <span>刚刚</span>
                        <span>layui框架综合</span>
                        <span class="fly-list-hint">
              <i class="iconfont" title="回答">&#xe60c;</i> 317
              <i class="iconfont" title="人气">&#xe60b;</i> 6830
            </span>
                    </p>
                </li>
                <li class="fly-list-li">
                    <a href="user/home.html" class="fly-list-avatar">
                        <img src="../res/images/avatar/00.jpg" alt="">
                    </a>
                    <h2 class="fly-tip">
                        <a href="jie/detail.html">基于 layui的轻量级问答社区页面模版 V2版本</a>
                        <span class="fly-tip-stick">置顶</span>
                    </h2>
                    <p>
                        <span><a href="user/home.html">纸飞机</a></span>
                        <span>30分钟前</span>
                        <span>技术闲谈</span>
                        <span class="fly-list-hint">
              <i class="iconfont" title="回答">&#xe60c;</i> 502
              <i class="iconfont" title="人气">&#xe60b;</i> 81689
            </span>
                    </p>
                </li>
            </ul>



            <ul class="fly-list">
                <li class="fly-list-li">
                    <a href="user/home.html" class="fly-list-avatar">
                        <img src="../res/images/avatar/default.png" alt="">
                    </a>
                    <h2 class="fly-tip">
                        <a href="jie/detail.html">关于layui 引用其他插件，扩展模块 的用法</a>
                    </h2>
                    <p>
                        <span><a href="user/home.html">用户昵称</a></span>
                        <span>1小时前</span>
                        <span>layui框架综合</span>
                        <span class="fly-list-hint">
              <i class="iconfont" title="回答">&#xe60c;</i> 8
              <i class="iconfont" title="人气">&#xe60b;</i> 106
            </span>
                    </p>
                </li>


            </ul>

            <div style="text-align: center">
                <div class="laypage-main">
                    <a href="jie/index.html" class="laypage-next">更多求解</a>
                </div>
            </div>

        </div>
    </div>

    @include('layouts.edge')
</div>

@include('layouts.footer')
<script src="{{ asset('layui/layui.js') }}"></script>

</body>
</html>