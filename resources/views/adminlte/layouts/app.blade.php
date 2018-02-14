<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.name', 'Laravel') }} | @if(Route::currentRouteName() !=='admin.home') {{$current_menu->display_name}} @else 首页 @endif</title>

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.bootcss.com/toastr.js/latest/toastr.min.css" rel="stylesheet">
    <link href="https://cdn.bootcss.com/iCheck/1.0.2/skins/all.css" rel="stylesheet">
    <link href="https://cdn.bootcss.com/select2/4.0.5/css/select2.min.css" rel="stylesheet">
    <link href="https://cdn.bootcss.com/datatables/1.10.16/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.bootcss.com/bootstrap-fileinput/4.4.6/css/fileinput.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ admin_asset('css/AdminLTE.min.css') }}">
    <link rel="stylesheet" href="{{ admin_asset('css/skins/_all-skins.min.css') }}">

    @yield("css")

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue fixed sidebar-mini">

<div class="wrapper">

@include('admin::adminlte.layouts.header')
@include('admin::adminlte.layouts.sidebar')

    <div class="content-wrapper">

        <section class="content-header">
            <h1>
                {{$current_menu->display_name}}
                <small>{{$current_menu->description}}</small>
            </h1>

        </section>

        <section class="content">

            @yield('content')

        </section>
    </div>



    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 1.2.0
        </div>
        <strong>Author: <a href="http://blog.golune.com">guhao</a>.</strong>
    </footer>

</div>

<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdn.bootcss.com/jQuery-slimScroll/1.3.8/jquery.slimscroll.min.js"></script>
<script src="https://cdn.bootcss.com/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdn.bootcss.com/select2/4.0.5/js/select2.full.min.js"></script>
<script src="https://cdn.bootcss.com/iCheck/1.0.2/icheck.min.js"></script>
<script src="https://cdn.bootcss.com/datatables/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.bootcss.com/datatables/1.10.16/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.bootcss.com/bootstrap-fileinput/4.4.6/js/fileinput.min.js"></script>
<script src="https://cdn.bootcss.com/bootstrap-fileinput/4.4.6/js/locales/zh.min.js"></script>

<script src="{{ admin_asset('js/adminlte.min.js') }}"></script>
<script src="{{ admin_asset('js/app.js') }}"></script>

<script type="text/javascript">
    function WE() {}
    WE.token = "{{ csrf_token() }}";

    @if(session("message"))
        toastr.success('{{ session("message") }}');
    @endif

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
        "aLengthMenu": [[20, 50, 100, -1], [20, 50, 100, "所有"]]
    } );

</script>

@yield('scripts')

</body>
</html>
