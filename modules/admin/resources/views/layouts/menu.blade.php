{{--
<li class="active">
    <a href="{{ admin_url() }}"><i class="fa fa-tachometer"></i> <span class="nav-label">控制台</span> </a>
</li>--}}

@if(Route::currentRouteName() =='admin.home')
<li class="active">
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
    @if(Admin::user()->can($menu->name) || Admin::user()->hasRole('admin'))

        <li
                @if (isset($current_menu->fid) && $current_menu->fid == $menu->id)

                class="active"

                @endif
        >

            <a href="#parent_menu_{{$menu->id}}">
                <i class="fa {{$menu->icon}}"></i>
                <span class="nav-label">{{ $menu->display_name }}</span>

                @if(count($menu->children) > 0)
                    <span class="fa arrow"></span>
                @endif
            </a>
            @if(count($menu->children) > 0)
            <ul class="nav nav-second-level">
                @foreach($menu->children as $child)
                    @if(Admin::user()->can($child->name) || Admin::user()->hasRole('admin'))
                        <li id="#parent_menu_{{$menu->id}}"

                            @if (isset($current_menu->id) && $current_menu->id == $child->id)

                                class="active"

                            @endif

                        >
                            <a href="{{ route($child->name) }}">

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
