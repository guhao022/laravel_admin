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

                            <form role="form">
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
                                        <div class="col-md-10">
                                            <input type="text" name="name" class="form-control" placeholder="用户昵称">
                                        </div>
                                    </div>
                                    <div class="form-group"><label class="col-md-2 control-label">Description:</label>
                                        <div class="col-md-10">
                                            <div class="summernote">
                                                <h3>Lorem Ipsum is simply</h3>
                                                dummy text of the printing and typesetting industry. <strong>Lorem Ipsum has been the industry's</strong> standard dummy text ever since the 1500s,
                                                when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic
                                                when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic
                                                typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with
                                                <br/>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group"><label class="col-sm-2 control-label">Meta Tag Title:</label>
                                        <div class="col-sm-10"><input type="text" class="form-control" placeholder="..."></div>
                                    </div>
                                    <div class="form-group"><label class="col-sm-2 control-label">Meta Tag Description:</label>
                                        <div class="col-sm-10"><input type="text" class="form-control" placeholder="Sheets containing Lorem"></div>
                                    </div>
                                    <div class="form-group"><label class="col-sm-2 control-label">Meta Tag Keywords:</label>
                                        <div class="col-sm-10"><input type="text" class="form-control" placeholder="Lorem, Ipsum, has, been"></div>
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