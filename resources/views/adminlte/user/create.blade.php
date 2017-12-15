@extends('admin::adminlte.layouts.app')
@section('title', $current_menu->display_name)

@section('content')

    <div class="row col-md-12">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title"> 新增用户</h3>
                <div class="box-tools">
                    <div class="btn-group">
                        <a class="btn btn-sm btn-default history-back">
                            <i class="fa fa-arrow-left"></i>&nbsp;返回
                        </a>
                    </div>

                    <div class="btn-group">
                        <a href="{{ route('admin.index') }}" class="btn btn-sm btn-default">
                            <i class="fa fa-list"></i>&nbsp;列表
                        </a>
                    </div>
                </div>
            </div>

            <form class="form-horizontal">
                <div class="box-body">
                    <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">Email</label>

                        <div class="col-sm-8">
                            <input type="email" name="email" class="form-control" id="email" placeholder="输入登录邮箱">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">名称</label>

                        <div class="col-sm-8">
                            <input type="name" name="name" class="form-control" id="name" placeholder="输入显示名称">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-sm-2 control-label">密码</label>

                        <div class="col-sm-8">
                            <input type="password" name="password" class="form-control" id="password" placeholder="输入登录密码">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation" class="col-sm-2 control-label">重复密码</label>

                        <div class="col-sm-8">
                            <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="输入确认密码">
                        </div>
                    </div>

                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="col-sm-offset-2 col-md-8">
                        <button type="reset" class="btn btn-warning">撤销</button>
                        <button type="submit" class="btn btn-info pull-right">提交</button>
                    </div>

                </div>
                <!-- /.box-footer -->
            </form>

        </div>
    </div>

@stop