<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle nav-avatar" src="http://img2.imgtn.bdimg.com/it/u=547138142,3998729701&fm=214&gp=0.jpg" />
                             </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear">
                                <span class="block m-t-xs"> <strong class="font-bold">哈哈</strong></span>
                                <span class="text-muted text-xs block"> 超级管理员 <b class="caret"></b></span>
                            </span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="profile.html">设 置</a></li>
                        <li class="divider"></li>
                        <li><a href="login.html">注 销</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    {{ config('app.logo', 'HH') }}
                </div>
            </li>
            <li class="active">
                <a href="/admin"><i class="fa fa-tachometer"></i> <span class="nav-label">控制台</span> </a>
            </li>
        </ul>

    </div>
</nav>