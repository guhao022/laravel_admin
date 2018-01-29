@extends('admin::adminlte.layouts.app')
@section('title', $current_menu->display_name)

@section('content')

    <div class="row col-md-12">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title"> 修改密码</h3>
                <div class="box-tools">
                    <div class="btn-group">
                        <a class="btn btn-sm btn-default history-back">
                            <i class="fa fa-arrow-left"></i>&nbsp;返回
                        </a>
                    </div>

                </div>
            </div>

            <form class="form-horizontal" method="POST" action="{{ route('my.reset') }}">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="box-body">

                    <div class="form-group">
                        <label for="old_password" class="col-sm-2 control-label">原始密码</label>

                        <div class="col-sm-8">
                            <input type="password" name="old_password" class="form-control" id="old_password" placeholder="输入原始密码">
                            @if ($errors->has('old_password'))
                                <span class="help-block text-red">
                                    <p><i class="fa fa-info-circle"></i> {{ $errors->first('old_password') }}</p>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password" class="col-sm-2 control-label">新密码</label>

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

@section('script')
    <script type="text/javascript">

    </script>
@stop