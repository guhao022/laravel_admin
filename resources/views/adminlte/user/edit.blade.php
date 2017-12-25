@extends('admin::adminlte.layouts.app')
@section('title', $current_menu->display_name)

@section('content')

    <div class="row col-md-12">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title"> 修改用户</h3>
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

            <form class="form-horizontal" enctype="multipart/form-data" method="POST" action="{{ route('admin.update', $admin->id) }}">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="box-body">
                    <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">Email</label>

                        <div class="col-sm-8">
                            <input type="email" disabled="disabled" name="email" class="form-control" id="email" value="{{ $admin->email }}" placeholder="输入登录邮箱">
                            @if ($errors->has('email'))
                                <span class="help-block text-red">
                                    <p><i class="fa fa-info-circle"></i> {{ $errors->first('email') }}</p>
                                </span>
                            @endif
                        </div>

                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">名称</label>

                        <div class="col-sm-8">
                            <input type="name" name="name" class="form-control" id="name" value="{{ $admin->name }}" placeholder="输入用户名称">
                            @if ($errors->has('name'))
                                <span class="help-block text-red">
                                    <p><i class="fa fa-info-circle"></i> {{ $errors->first('name') }}</p>
                                </span>
                            @endif
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="password" class="col-sm-2 control-label">密码</label>

                        <div class="col-sm-8">
                            <input type="password" name="password" class="form-control" id="password" placeholder="输入登录密码">
                            @if ($errors->has('password'))
                                <span class="help-block text-red">
                                    <p><i class="fa fa-info-circle"></i> {{ $errors->first('password') }}</p>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation" class="col-sm-2 control-label">重复密码</label>

                        <div class="col-sm-8">
                            <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="输入确认密码">
                            @if ($errors->has('password_confirmation'))
                                <span class="help-block text-red">
                                    <p><i class="fa fa-info-circle"></i> {{ $errors->first('password_confirmation') }}</p>
                                </span>
                            @endif
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="role" class="col-sm-2 control-label">头像</label>
                        <div class="col-sm-8">

                            <input type="file" value="{{ admin_avatar($admin->avatar) }}" class="avatar" id="avatar" name="avatar" placeholder="选择头像" />

                            @if ($errors->has('avatar'))
                                <span class="help-block text-red">
                                    <p><i class="fa fa-info-circle"></i> {{ $errors->first('avatar') }}</p>
                                </span>
                            @endif
                        </div>
                    </div>



                </div>

                <div class="box-footer">
                    <div class="col-sm-offset-2 col-md-8">
                        <button type="reset" class="btn btn-warning">撤销</button>
                        <button type="submit" class="btn btn-info pull-right">提交</button>
                    </div>

                </div>

            </form>

        </div>
    </div>

@stop

@section('scripts')
    <script type="text/javascript">

        initFileInput('avatar', '{{ admin_avatar($admin->avatar) }}')
    </script>
@stop