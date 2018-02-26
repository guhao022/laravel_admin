@extends('admin::adminlte.layouts.app')
@section('title', $current_menu->display_name)

@section('content')
    <div class="">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title"></h3>

                {{--<div class="pull-right">
                    <div class="form-inline pull-right">
                        <form action="" method="get">
                            <fieldset>
                                <div class="input-group input-group-sm">
                                    <span class="input-group-addon"><strong>ID</strong></span>
                                    <input type="text" class="form-control" placeholder="Id" name="id" value="">
                                </div>

                                <div class="btn-group btn-group-sm">
                                    <button type="submit" class="btn btn-primary" title="搜索"><i class="fa fa-search"></i></button>
                                    <a href="{{ route($current_menu->name) }}" class="btn btn-warning" title="还原"><i class="fa fa-undo"></i></a>
                                </div>

                            </fieldset>
                        </form>
                    </div>

                </div>--}}

                <div class="btn-group pull-right">
                    <a class="btn btn-sm btn-default history-back">
                        <i class="fa fa-arrow-left"></i>&nbsp;返回
                    </a>
                </div>

                <div class="btn-group">
                    <a href="{{ route('permission.create') }}" class="btn btn-sm btn-success">
                        <i class="fa fa-save"></i>&nbsp;&nbsp;新增
                    </a>
                </div>
            </div>
            <div class="box-body table-responsive no-padding">

                <table class="table table-hover">
                    <tbody>
                    <tr>
                        <th width="6%" class="text-center">ID</th>
                        <th>名称</th>
                        <th>标识</th>
                        <th>简介</th>
                        <th>类别</th>
                        <th>管理</th>
                    </tr>
                    </tbody>

                    @foreach($permissions as $permission)
                        <tr id="tr_{{$permission->id}}">
                            <td class="text-center">{{$permission->id}}</td>
                            <td class="text-aqua text-bold">{{$permission->display_name}}</td>
                            <td>{{$permission->name}}</td>
                            <td>{{$permission->description}}</td>
                            <td>{{$permission->parentName($permission->pid)}}</td>
                            <td>

                                <a href="{{ route('permission.edit', $permission->id) }}">
                                    <i class="fa fa-edit"></i>&nbsp;
                                </a>
                                <a href="javascript:void(0);" data-id="{{$permission->id}}" data-route="{{route('permission.destroy', $permission->id)}}"class="grid-row-delete">
                                    <i class="fa fa-trash"></i>&nbsp;
                                </a>

                            </td>
                        </tr>

                        @if(is_array($permission->children) && count($permission->children) > 0)

                            @foreach($permission->children as $child)

                                <tr id="tr_{{$child->id}}">
                                    <td class="text-center">{{$child->id}}</td>
                                    <td class="text-green">&nbsp;&nbsp;&nbsp;&nbsp;┝━━ {{$child->display_name}}</td>
                                    <td>{{$child->name}}</td>
                                    <td>{{$child->description}}</td>
                                    <td>{{$child->parentName($child->pid)}}</td>
                                    <td>

                                        <a href="{{ route('permission.edit', $child->id) }}">
                                            <i class="fa fa-edit"></i>&nbsp;
                                        </a>
                                        <a href="javascript:void(0);" data-id="{{$child->id}}" data-route="{{route('permission.destroy', $child->id)}}"class="grid-row-delete">
                                            <i class="fa fa-trash"></i>&nbsp;
                                        </a>

                                    </td>
                                </tr>


                                @if(is_array($child->children) && count($child->children) > 0)

                                    @foreach($child->children as $ch)

                                        <tr id="tr_{{$ch->id}}">
                                            <td class="text-center">{{$ch->id}}</td>
                                            <td class="text-orange">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;┝━━ {{$ch->display_name}}</td>
                                            <td>{{$ch->name}}</td>
                                            <td>{{$ch->description}}</td>
                                            <td>{{$ch->parentName($ch->pid)}}</td>
                                            <td>
                                                <a href="{{ route('permission.edit', $ch->id) }}">
                                                    <i class="fa fa-edit"></i>&nbsp;
                                                </a>
                                                <a href="javascript:void(0);" data-id="{{$ch->id}}" data-route="{{route('permission.destroy', $ch->id)}}"class="grid-row-delete">
                                                    <i class="fa fa-trash"></i>&nbsp;
                                                </a>

                                            </td>
                                        </tr>

                                        @if(is_array($ch->children) && count($ch->children) > 0)

                                            @foreach($ch->children as $c)
                                            <tr id="tr_{{$c->id}}">
                                                <td class="text-center">{{$c->id}}</td>
                                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;┗━━ {{$c->display_name}}</td>
                                                <td>{{$c->name}}</td>
                                                <td>{{$c->description}}</td>
                                                <td>{{$c->parentName($c->pid)}}</td>
                                                <td>
                                                    <a href="{{ route('permission.edit', $c->id) }}">
                                                        <i class="fa fa-edit"></i>&nbsp;
                                                    </a>
                                                    <a href="javascript:void(0);" data-id="{{$c->id}}" data-route="{{route('permission.destroy', $c->id)}}"class="grid-row-delete">
                                                        <i class="fa fa-trash"></i>&nbsp;
                                                    </a>

                                                </td>
                                            </tr>

                                            @endforeach

                                        @endif

                                    @endforeach

                                @endif

                            @endforeach

                        @endif
                    @endforeach
                </table>
            </div>

            {{--<div class="pull-right">{{ $permissions->links() }}</div>--}}

        </div>
    </div>
@stop
@section('scripts')

    <script type="text/javascript">

        $('.grid-row-delete').unbind('click').click(function() {
            var id=$(this).data('id');

            if(confirm("确认删除?")) {
                $.ajax({
                    method: 'post',
                    url: $(this).data('route'),
                    data: {
                        _method:'delete',
                        _token:WE.token,
                    },
                    success: function (data) {

                        if (typeof data === 'object') {
                            if (data.status) {
                                $('#tr_'+id).remove();
                                toastr.success(data.message);
                            } else {
                                toastr.error(data.message);
                            }
                        }
                    }
                });
            }
        });

    </script>

@stop