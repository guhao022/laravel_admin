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

                            <input type="hidden" name="permission_ids">
                            <button type="button" class="btn btn-sm btn-social btn-success" data-toggle="modal" data-target="#chose-permission">
                                <i class="fa fa-lock"></i> 选择权限
                            </button>

                            {{--<select name="permission_ids[]" class="form-control select2" multiple="multiple" data-placeholder="选择角色权限">
                                @foreach($permissions as $permission)
                                    <option value="{{ $permission->id }}"
                                            @if(!empty(old('permission_ids')) && in_array($permission->id, old('permission_ids'))) selected @endif
                                    >{{ $permission->display_name }}</option>
                                @endforeach
                            </select>--}}
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

    <div class="modal fade" id="chose-permission">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">选择权限</h4>
                </div>
                <div class="modal-body">
                    <ul class="list-unstyled">
                        <li>Lorem ipsum dolor sit amet</li>
                        <li>Consectetur adipiscing elit</li>
                        <li>Integer molestie lorem at massa</li>
                        <li>Facilisis in pretium nisl aliquet</li>
                        <li>Nulla volutpat aliquam velit
                            <ul>
                                <li>Phasellus iaculis neque</li>
                                <li>Purus sodales ultricies</li>
                                <li>Vestibulum laoreet porttitor sem</li>
                                <li>Ac tristique libero volutpat at</li>
                            </ul>
                        </li>
                        <li>Faucibus porta lacus fringilla vel</li>
                        <li>Aenean sit amet erat nunc</li>
                        <li>Eget porttitor lorem</li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">关闭</button>
                    <button type="button" class="btn btn-primary" id="submit">确认</button>
                </div>
            </div>
        </div>
    </div>

@stop
