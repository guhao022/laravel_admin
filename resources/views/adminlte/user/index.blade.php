@extends('admin::adminlte.layouts.app')
@section('title', $current_menu->display_name)

@section('content')
    <div class="row col-md-12">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title"></h3>

                <div class="pull-right">
                    <div class="form-inline pull-right">
                        {{--<form action="" method="get">
                            <fieldset>
                                <div class="input-group input-group-sm">
                                    <span class="input-group-addon alert-info"><strong>Email</strong></span>
                                    <input type="text" class="form-control" placeholder="邮箱" name="email" value="">
                                </div>
                                <div class="input-group input-group-sm">
                                    <span class="input-group-addon alert-info"><strong>名称</strong></span>
                                    <input type="text" class="form-control" placeholder="名称" name="name" value="">
                                </div>

                                <div class="input-group input-group-sm">
                                    <span class="input-group-addon alert-info"><strong>名称</strong></span>
                                    <input type="text" class="form-control" placeholder="名称" name="name" value="">
                                </div>

                                <div class="btn-group btn-group-sm">
                                    <button type="submit" class="btn btn-primary" title="搜索"><i class="fa fa-search"></i></button>
                                    <a href="{{ route($current_menu->name) }}" class="btn btn-warning" title="还原"><i class="fa fa-undo"></i></a>
                                </div>

                            </fieldset>
                        </form>--}}
                    </div>

                </div>

                <div class="btn-group">
                    <a href="{{ route('admin.create') }}" class="btn btn-sm btn-success">
                        <i class="fa fa-save"></i>&nbsp;&nbsp;新增
                    </a>
                </div>
            </div>
            <div class="box-body table-responsive ">
                <table class="table table-hover dataTable" data-nosort="1,6">
                    <thead>
                    <tr>
                        <th width="5%">ID</th>
                        <th width="15%">Email</th>
                        <th width="15%">名称</th>
                        <th width="">角色</th>
                        <th  width="15%">最后登录</th>
                        <th  width="8%">管理</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($admins as $admin)
                    <tr id="tr_{{$admin->id}}">
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
                                <a href="{{ route('admin.edit', $admin->id) }}">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="javascript:void(0);" data-id="{{$admin->id}}" data-route="{{route('admin.destroy', $admin->id)}}"class="grid-row-delete">
                                    <i class="fa fa-trash"></i>
                                </a>
                            @endif

                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop
@section('scripts')

    <script type="text/javascript">

        $('.dataTable').dataTable( {

            "oLanguage": {
                "sLengthMenu": "每页显示 _MENU_ 条记录",
                "sInfo": "显示第 _START_ 至 _END_ 项结果，共 _TOTAL_ 项",
                "sInfoEmpty": "没有数据",
                "sSearch": "搜索:",
                "sInfoFiltered": "(从 _MAX_ 条数据中检索)",
                "sLoadingRecords": "载入中...",
                "oPaginate": {
                    "sFirst": "首页",
                    "sPrevious": "前一页",
                    "sNext": "后一页",
                    "sLast": "尾页"
                },
                "sZeroRecords": "没有检索到数据",
            },
            "aLengthMenu": [[20, 50, 100, -1], [20, 50, 100, "所有"]],
            "aoColumnDefs": [ { "bSortable": false, "aTargets": [ 5 ] }]
        } );

        $('.grid-row-delete').unbind('click').click(function() {
            var id=$(this).data('id');
            if (id == 1) {
                alert('初始管理员不能删除');
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