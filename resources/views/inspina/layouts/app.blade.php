<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} | @if(Route::currentRouteName() !=='admin.home') {{$current_menu->display_name}} @endif
    </title>

    <!-- Styles -->
    <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{ admin_asset('css/animate.css') }}" rel="stylesheet">
    <link href="{{ admin_asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ admin_asset('css/common.css') }}" rel="stylesheet">

    @yield('stylesheet')
</head>
<body>
<div id="wrapper">
    @include('admin::inspina.layouts.navbar')

    <div id="page-wrapper" class="gray-bg">

        @include('admin::inspina.layouts.topbar')

        @if (Route::currentRouteName() !=='admin.home')
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>
                    {{$current_menu->display_name}}
                </h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="{{ admin_url() }}">首页</a>
                    </li>
                    @foreach ($breadcrumb as $bv)
                    <li
                        @if ($current_menu->name == $bv->name)
                            class="active"
                        @endif
                    >
                        @if ($bv->pid > 0)
                            <a href="{{ route($bv->name) }}">{{ $bv->display_name }}</a>
                        @else
                            <a>{{ $bv->display_name }}</a>
                        @endif
                    </li>

                    @endforeach
                </ol>
            </div>
            <div class="col-lg-2">

            </div>
        </div>
        @endif


        <div class="wrapper wrapper-content animated fadeInRight">
            @yield('content')
        </div>
    </div>
</div>

{{--<footer class="footer">
    <div class="container">
        <p class="text-muted">{{ config('app.name') }}</p>
    </div>
</footer>--}}

<!-- Scripts -->
@include('admin::inspina.layouts.scripts')

@yield('scripts')

</body>
</html>
