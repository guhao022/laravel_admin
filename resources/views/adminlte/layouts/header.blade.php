<header class="main-header">
    <!-- Logo -->
    <a href="{{ admin_url() }}" class="logo">

        <span class="logo-mini">
            {{ config('app.logo', 'WE') }}
        </span>

        <span class="logo-lg">
            {{ config('app.name', 'Weasy') }}
        </span>
    </a>

    <nav class="navbar navbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">切换导航</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="@if(admin_user()->avatar) {{ config("admin.upload.avatar") . DIRECTORY_SEPARATOR . admin_user()->avatar }} @else {{admin_asset('img/user2-160x160.jpg')}} @endif" class="user-image" alt="">
                        <span class="hidden-xs">
                            @if (admin_user()->name) {{admin_user()->name}} @else {{admin_user()->email}} @endif
                        </span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="@if(admin_user()->avatar) {{ config("admin.upload.avatar") . DIRECTORY_SEPARATOR . admin_user()->avatar }} @else {{admin_asset('img/user2-160x160.jpg')}} @endif" class="img-circle" alt="">

                            <p>
                                @if (admin_user()->name) {{admin_user()->name}} @else {{admin_user()->email}} @endif
                                <small>最后登录于 <i class="fa fa-clock"></i> {{ admin_user()->last_login }} </small>
                            </p>
                        </li>

                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="{{ route('admin.profile') }}" class="btn btn-default btn-flat">设置</a>
                            </div>
                            <div class="pull-right">

                                <a href="#" class="btn btn-default btn-flat"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    注 销
                                </a>

                                <form id="logout-form" action="{{route('admin.logout')}}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
    </nav>
</header>