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
                    <a href="{{ route('admin.create') }}" class="btn btn-sm btn-success">
                        <i class="fa fa-save"></i>&nbsp;&nbsp;新增
                    </a>
                </div>
            </div>
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tbody>
                    <tr>
                        <th width="3%">
                            <input type="checkbox" class="minimal-red grid-select-all">
                        </th>
                        <th>ID</th>
                        <th>Email</th>
                        <th>名称</th>
                        <th>角色</th>
                        <th>最后登录</th>
                        <th>管理</th>
                    </tr>

                    @foreach($admins as $admin)
                    <tr>
                        <td>
                            @if($admin->id != '1')
                            <input type="checkbox" class="minimal grid-row-checkbox" data-id="{{ $admin->id }}" />
                            @endif
                        </td>
                        <td>{{$admin->id}}</td>
                        <td>{{$admin->email}}</td>
                        <td>{{$admin->name}}</td>
                        <td>
                            @foreach($admin->roles as $role)
                                <span class="label label-success">{{ $role->display_name }}</span>
                            @endforeach
                        </td>
                        <td>{{$admin->last_login}}</td>
                        <td>
                            @if($admin->id != '1')
                                <a href="#">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="javascript:void(0);" data-id="{{$admin->id}}" class="grid-row-delete">
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
            if ($(this).data('id') == 1) {
                alert('初始管理员不能删除');
            }
            if(confirm("确认删除?")) {
                $.ajax({
                    method: 'post',
                    url: '/admin/admin/' + $(this).data('id'),
                    data: {
                        _method:'delete',
                        _token:LA.token,
                    },
                    success: function (data) {

                        if (typeof data === 'object') {
                            if (data.status) {
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