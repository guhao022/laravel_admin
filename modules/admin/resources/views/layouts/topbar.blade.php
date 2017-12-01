<div class="row border-bottom">
    <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>

        </div>
        <ul class="nav navbar-top-links navbar-right">
            <li>
                <span class="m-r-sm text-muted welcome-message">欢迎进入 {{ config('app.name', 'Laravel') }} 后台管理系统</span>
            </li>

            <li class="dropdown">
                <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-user"></i> 用户名
                    <span class="caret"></span>
                </a>

                <ul class="dropdown-menu">
                    <li>
                        <div class="text-center link-block">
                            <a href="#">
                                账号设置
                            </a>
                        </div>
                    </li>
                    <li class="divider"></li>

                    <li>
                        <div class="text-center link-block">
                            <a href="#"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                注销
                            </a>

                            <form id="logout-form" action="#" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </li>
                </ul>
            </li>

            <li>
                <a href="#"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    <i class="fa fa-sign-out"></i> 注销
                </a>

                <form id="logout-form" action="#" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>

        </ul>

    </nav>
</div>