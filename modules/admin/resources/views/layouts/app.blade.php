<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} | @yield('title')</title>

    <!-- Styles -->
    <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{ admin_asset('css/animate.css') }}" rel="stylesheet">
    <link href="{{ admin_asset('css/style.css') }}" rel="stylesheet">

    @yield('stylesheet')
</head>
<body>
<div id="wrapper">
    @include('admin::layouts.navbar')

    <div id="page-wrapper" class="gray-bg">

        @include('admin::layouts.topbar')

        @yield('content')
    </div>
</div>

{{--<footer class="footer">
    <div class="container">
        <p class="text-muted">{{ config('app.name') }}</p>
    </div>
</footer>--}}

<!-- Scripts -->
@include('admin::layouts.scripts')

@yield('scripts')

</body>
</html>
