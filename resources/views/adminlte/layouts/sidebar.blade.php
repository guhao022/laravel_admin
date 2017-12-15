<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ admin_asset('img/user2-160x160.jpg') }}" class="img-circle" alt="">
            </div>
            <div class="pull-left info">
                <p>@if (admin_user()->name) {{admin_user()->name}} @else {{admin_user()->email}} @endif</p>
                <a><i class="fa fa-circle text-success"></i> 在线</a>
            </div>
        </div>

        @include('admin::adminlte.layouts.menu')

    </section>
    <!-- /.sidebar -->
</aside>