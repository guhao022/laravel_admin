@extends('admin::layouts.app')
@section('title', '用户设置')

@section('content')

    <div class="row">

        <div class="col-lg-7">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h3><i class="fa fa-user"></i> 个人信息 </h3>
                </div>
                <div class="ibox-content">
                    <div class="row">

                        <div class="col-md-3 text-center">
                            <div class="text-center">
                                <img alt="image" class="img-circle m-t-xs img-responsive" src="http://img2.imgtn.bdimg.com/it/u=547138142,3998729701&fm=214&gp=0.jpg">
                                <br>
                                <a class="btn btn-primary btn-rounded btn-outline" href="#">
                                    点击更换头像
                                </a>
                            </div>
                        </div>

                        <div class="col-md-9">

                            <form class="m-t" role="form" method="POST" action="admin/user/setting/{{ $user->id }}">
                                <fieldset class="form-horizontal">
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">用户名:</label>
                                        <div class="col-md-6">
                                            <input type="username" name="username" disabled="disabled" class="form-control" value="{{ $user->username }}" required placeholder="用户名">
                                        </div>

                                        <div class="control-label pull-left">
                                            <span class="label label-warning"> 登录名不允许更改</span>
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label">密 码:</label>
                                        <div class="col-md-6">
                                            <input type="password" name="password" disabled="disabled" class="form-control" value="******" required placeholder="密码">
                                        </div>

                                        <div class="control-label pull-left">
                                            <a href="#"> 修改密码</a>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">昵称:</label>
                                        <div class="col-md-6">
                                            <input type="text" name="name" value="{{ $user->name }}" class="form-control" placeholder="用户昵称">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-4 col-sm-offset-2">
                                            <button class="btn btn-primary" type="submit">保存更改</button>
                                        </div>
                                    </div>


                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{--<div class="form-group">
            <label class="col-sm-2 control-label">Normal</label>

            <div class="col-sm-10">
                <input type="text" class="form-control">
            </div>
        </div>--}}
    </div>
@stop