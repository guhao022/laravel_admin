<ul class="sidebar-menu" data-widget="tree">
    <li class="header">
        @if (Route::currentRouteName() !=='admin.home')
            {{ $current_menu->display_menu }}
        @else
            主导航
        @endif
    </li>


    @if(Route::currentRouteName() =='admin.home')
    <li class="treeview active">
        <a href="{{ admin_url() }}">
            <i class="fa fa-tachometer"></i> <span class="nav-label">控制台</span>
        </a>
    </li>
    @else
        <li>
            <a href="{{ admin_url() }}">
                <i class="fa fa-tachometer"></i> <span class="nav-label">控制台</span>
            </a>
        </li>
    @endif

    {{--循环输出树形菜单--}}
    @foreach($menus as $menu)
        @if(admin_user()->can($menu->name) || admin_user()->hasRole('admin'))

            <li class="
            @if(is_array($menu->children) && count($menu->children) > 0)
                treeview
            @endif
            @if (isset($current_menu->pid) && $current_menu->pid == $menu->id)
                active
            @endif
            ">

                <a href="">
                    <i class="fa {{$menu->icon}}"></i>
                    <span class="nav-label">{{ $menu->display_name }}</span>

                    @if(is_array($menu->children) && count($menu->children) > 0)
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    @endif
                </a>
                @if(is_array($menu->children) && count($menu->children) > 0)
                    <ul class="treeview-menu">
                        @foreach($menu->children as $child)
                            @if(admin_user()->can($child->name) || admin_user()->hasRole('admin'))
                                <li class="
                                    @if (isset($current_menu->id) && $current_menu->id == $child->id)
                                    active
                                    @endif
                                ">
                                    <a href="

                                    <?php
                                            try(route($child->name))

                                    ?>

">
                                        <i class="fa fa-circle-o"></i>
                                        {{ $child->display_name }}
                                    </a>

                                </li>
                            @endif
                        @endforeach
                    </ul>
                @endif
            </li>

        @endif

    @endforeach
