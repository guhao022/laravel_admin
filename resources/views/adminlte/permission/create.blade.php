@extends('admin::adminlte.layouts.app')
@section('title', $current_menu->display_name)

@section("css")
    <link rel="stylesheet" href="{{ admin_asset('plugins/iconpicker/css/fontawesome-iconpicker.min.css') }}">
    <style type="text/css">
        .iconpicker-popover.popover {
            width: 385px !important;
        }
    </style>
@stop

@section('content')

    <div class="row col-md-12">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title"> 新增权限</h3>
                <div class="box-tools">
                    <div class="btn-group">
                        <a class="btn btn-sm btn-default history-back">
                            <i class="fa fa-arrow-left"></i>&nbsp;返回
                        </a>
                    </div>

                    <div class="btn-group">
                        <a href="{{ route('permission.index') }}" class="btn btn-sm btn-default">
                            <i class="fa fa-list"></i>&nbsp;列表
                        </a>
                    </div>
                </div>
            </div>

            <form class="form-horizontal" method="POST" action="{{ route('permission.store') }}">
                {{ csrf_field() }}
                <div class="box-body">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">权限标识</label>

                        <div class="col-sm-8">
                            <input type="name" name="name" class="form-control" id="name" value="{{ old('name') }}" placeholder="输入权限名称">
                            @if ($errors->has('name'))
                                <span class="help-block text-red">
                                    <p><i class="fa fa-info-circle"></i> {{ $errors->first('name') }}</p>
                                </span>
                            @endif
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="display_name" class="col-sm-2 control-label">显示名称</label>

                        <div class="col-sm-8">
                            <input type="display_name" name="display_name" class="form-control" id="display_name" value="{{ old('display_name') }}" placeholder="输入权限显示名称">
                            @if ($errors->has('display_name'))
                                <span class="help-block text-red">
                                    <p><i class="fa fa-info-circle"></i> {{ $errors->first('display_name') }}</p>
                                </span>
                            @endif
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="description" class="col-sm-2 control-label">图标</label>

                        <div class="col-sm-2">

                            <div class="input-group">
                                <span class="input-group-addon"></span>
                                <input data-placement="bottomLeft" name="icon" class="form-control icp icp-auto" type="text" value="@if(empty(old('icon'))) fa-arrow-right @else {{ old('icon') }} @endif" placeholder="输入显示图标" />

                            </div>


                            @if ($errors->has('icon'))
                                <span class="help-block text-red">
                                    <p><i class="fa fa-info-circle"></i> {{ $errors->first('icon') }}</p>
                                </span>
                            @endif
                        </div>

                    </div>


                    <div class="form-group">
                        <label for="group_name" class="col-sm-2 control-label">分组</label>

                        <div class="col-sm-8">
                            <input type="group_name" name="group_name" class="form-control" id="group_name" value="{{ old('group_name') }}" placeholder="输入权限分组名称">
                            @if ($errors->has('group_name'))
                                <span class="help-block text-red">
                                    <p><i class="fa fa-info-circle"></i> {{ $errors->first('group_name') }}</p>
                                </span>
                            @endif
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="is_menu" class="col-sm-2 control-label">注册菜单</label>

                        <div class="col-sm-8">
                            <label class="control-label">
                                <input type="radio" name="is_menu" class="minimal-red" value="1">&nbsp;注册
                            </label>
                            &nbsp;&nbsp;
                            <label class="control-label">
                                <input type="radio" name="is_menu" class="minimal-red" value="0" checked> 不注册
                            </label>

                        </div>

                    </div>

                    <div class="form-group">
                        <label for="Permission" class="col-sm-2 control-label">权限</label>
                        <div class="col-sm-8">
                            <select name="pid" class="form-control" data-placeholder="选择上级菜单">

                                <option value="0" class="text-aqua">顶级权限</option>
                                @foreach($top_menu as $tm)

                                    <option value="{{ $tm->id }}" @if(old('pid') == $tm->id) selected @endif >
                                        |-- {{ $tm->display_name }}
                                    </option>
                                @endforeach
                            </select>

                        </div>
                    </div>

                </div>



                <div class="box-footer">
                    <div class="col-sm-offset-2 col-md-8">
                        <button type="reset" class="btn btn-warning">重置</button>
                        <button type="submit" class="btn btn-info pull-right">提交</button>
                    </div>

                </div>

            </form>

        </div>
    </div>

@stop

@section("scripts")

    <script src="{{ admin_asset('plugins/iconpicker/js/fontawesome-iconpicker.min.js') }}"></script>

    <script type="text/javascript">
        $(function() {
            $('.icp-auto').iconpicker();
        });
    </script>

@stop


