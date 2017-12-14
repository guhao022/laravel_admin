<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} | 登录 </title>

    <link href="{{ admin_asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <link href="{{ admin_asset('css/animate.css') }}" rel="stylesheet">
    <link href="{{ admin_asset('css/style.css') }}" rel="stylesheet">

</head>

<body class="gray-bg">

<div class="middle-box text-center loginscreen animated fadeInDown">
    <div>
        <div>

            <h1 class="logo-name">{{ config('app.logo', 'WE') }}</h1>

        </div>
        <h3>欢迎登录 {{ config('app.name', 'Laravel') }} 管理系统</h3>
        <p>
        </p>
        <form class="m-t" role="form" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <input id="email" type="email" class="form-control" name="email"  placeholder="登录邮箱" value="{{ old('email') }}" required autofocus>

                @if ($errors->has('email'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                <input id="password" type="password" class="form-control" placeholder="密 码" name="password" required>

                @if ($errors->has('password'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                @endif
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-3">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> 记住我
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary block full-width m-b">
                    登录
                </button>

            </div>
            <p class="text-muted text-center"><small></small></p>
            {{--<a class="btn btn-sm btn-white btn-block" href="register.html">新建账号</a>--}}
        </form>
        <hr>
        <p class="m-t"> <small>POWER BY WEASY &copy; 2017</small> </p>
    </div>
</div>

<!-- Mainly scripts -->
<script src="{{ admin_asset('js/jquery-3.1.1.min.js') }}"></script>
<script src="{{ admin_asset('js/bootstrap.min.js') }}"></script>

</body>

</html>
