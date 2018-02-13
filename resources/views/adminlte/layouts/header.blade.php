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

        <div class="collapse navbar-collapse pull-left">
            <ul class="nav navbar-nav">

                @foreach($modules as $module)
                    @if(admin_user()->can($module->name) || admin_user()->hasRole('admin'))

                    <li @if(Request::is(config("admin.route.prefix").'/'.$module->group_name.'*')) class="active" @endif>
                        <a href="{{ route($module->name) }}"> {{ $module->display_name }} </a>
                    </li>

                    @endif

                @endforeach

            </ul>

        </div>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="@if(admin_user()->avatar) {{ admin_avatar(admin_user()->avatar) }} @else {{admin_asset('img/user2-160x160.jpg')}} @endif" class="user-image" alt="">
                        <span class="hidden-xs">
                            @if (admin_user()->name) {{admin_user()->name}} @else {{admin_user()->email}} @endif
                        </span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="@if(admin_user()->avatar) {{ admin_avatar(admin_user()->avatar) }} @else {{admin_asset('img/user2-160x160.jpg')}} @endif" class="img-circle" alt="">

                            <p>
                                @if (admin_user()->name) {{admin_user()->name}} @else {{admin_user()->email}} @endif
                                <small>最后登录于 <i class="fa fa-clock"></i> {{ admin_user()->last_login }} </small>
                            </p>
                        </li>

                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="{{ route('my.profile', ['id'=>admin_user()->id]) }}" class="btn btn-default btn-flat">设置</a>
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