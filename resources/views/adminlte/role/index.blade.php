@extends('admin::adminlte.layouts.app')
@section('title', $current_menu->display_name)

@section('content')
    <div class="row col-md-12">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title"></h3>

                <div class="pull-right">
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

                </div>

                <div class="btn-group">
                    <a href="{{ route('role.create') }}" class="btn btn-sm btn-success">
                        <i class="fa fa-save"></i>&nbsp;&nbsp;新增
                    </a>
                </div>
            </div>
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tbody>
                    <tr>
                        <th>ID</th>
                        <th>标识</th>
                        <th>名称</th>
                        <th>创建时间</th>
                        <th>更新时间</th>
                        <th>管理</th>
                    </tr>

                    @foreach($roles as $role)
                        <tr id="tr_{{$role->id}}">
                            <td>{{$role->id}}</td>
                            <td>{{$role->name}}</td>
                            <td>{{$role->display_name}}</td>
                            <td>
                                {{$role->created_at}}
                            </td>
                            <td>{{$role->updated_at}}</td>
                            <td>
                                @if($role->id != '1')
                                    <a href="{{ route('role.edit', $role->id) }}">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="javascript:void(0);" data-id="{{$role->id}}" data-route="{{route('role.destroy', $role->id)}}"class="grid-row-delete">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                @endif

                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>

        </div>
    </div>
@stop
@section('scripts')

    <script type="text/javascript">

        $('.grid-row-delete').unbind('click').click(function() {
            var id=$(this).data('id');
            if (id == 1) {
                alert('初始角色不能删除');
            }
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