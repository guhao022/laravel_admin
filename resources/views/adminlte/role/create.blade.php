@extends('admin::adminlte.layouts.app')
@section('title', $current_menu->display_name)

@section('content')

    <div class="row col-md-12">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title"> 新增角色</h3>
                <div class="box-tools">
                    <div class="btn-group">
                        <a class="btn btn-sm btn-default history-back">
                            <i class="fa fa-arrow-left"></i>&nbsp;返回
                        </a>
                    </div>

                    <div class="btn-group">
                        <a href="{{ route('role.index') }}" class="btn btn-sm btn-default">
                            <i class="fa fa-list"></i>&nbsp;列表
                        </a>
                    </div>
                </div>
            </div>

            <form class="form-horizontal" method="POST" action="{{ route('role.store') }}">
                {{ csrf_field() }}
                <div class="box-body">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">标识</label>

                        <div class="col-sm-8">
                            <input type="name" name="name" class="form-control" id="name" value="{{ old('name') }}" placeholder="输入角色标识">
                            @if ($errors->has('name'))
                                <span class="help-block text-red">
                                    <p><i class="fa fa-info-circle"></i> {{ $errors->first('name') }}</p>
                                </span>
                            @endif
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="display_name" class="col-sm-2 control-label">角色名</label>

                        <div class="col-sm-8">
                            <input type="display_name" name="display_name" class="form-control" id="display_name" value="{{ old('display_name') }}" placeholder="输入角色名称">
                            @if ($errors->has('display_name'))
                                <span class="help-block text-red">
                                    <p><i class="fa fa-info-circle"></i> {{ $errors->first('display_name') }}</p>
                                </span>
                            @endif
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="description" class="col-sm-2 control-label">简介</label>

                        <div class="col-sm-8">
                            <input type="description" name="description" class="form-control" id="description" value="{{ old('description') }}" placeholder="输入角色简介">
                            @if ($errors->has('description'))
                                <span class="help-block text-red">
                                    <p><i class="fa fa-info-circle"></i> {{ $errors->first('description') }}</p>
                                </span>
                            @endif
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="Permission" class="col-sm-2 control-label">权限</label>
                        <div class="col-sm-8">

                            @if ($errors->has('permission_ids'))
                                <span class="help-block text-red">
                                    <p><i class="fa fa-info-circle"></i> {{ $errors->first('permission_ids') }}</p>
                                </span>
                            @endif

                            <ul class="list-unstyled">

                                @foreach($tree_menu as $tm)
                                    <li>
                                        <input type="checkbox" name="permission_ids[]" @if(is_array(old('permission_ids')) && in_array($tm->id, old('permission_ids'))) checked @endif class="minimal-red grid-select-all _menu" id="pm-{{$tm->id}}" value="{{$tm->id}}" />
                                        &nbsp; <b class="text-aqua">{{ $tm->display_name }}</b>
                                        @if(is_array($tm->children) && count($tm->children) > 0)
                                            <ul class="list-inline">
                                                @foreach($tm->children as $child)
                                                    <li class="col-md-2 col-sm-3 col-xs-4">
                                                        <input type="checkbox" name="permission_ids[]" @if(is_array(old('permission_ids')) && in_array($child->id, old('permission_ids'))) checked @endif data-pid="{{$tm->id}}" class="minimal grid-row-checkbox _menu m-{{$tm->id}}" value="{{ $child->id }}" />
                                                        &nbsp; {{ $child->display_name }}
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
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

