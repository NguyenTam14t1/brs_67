<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ trans('lang.title') }}</title>

    @section('css')
        <!-- Fonts -->
        {{ Html::style('//fonts.googleapis.com/css?family=Nunito') }}
        {{ Html::style('//fonts.gstatic.com') }}
        <!-- Styles -->
        {{ Html::style(asset('css/app.css')) }}
    @show
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ trans('lang.title') }}
            </a>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ trans('login.title_login') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ trans('register.title_register') }}</a>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a id="logout" class="dropdown-item" href="{{ route('logout') }}">
                                        {{ trans('login.btn_logout') }}
                                    </a>

                                    {{ Form::open(['method' => 'post', 'route' => 'logout', 'id' => 'logout-form']) }}
                                    @csrf
                                    {{ Form::close() }}
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    @section('js')
        {{ Html::script(asset('js/app.js')) }}
        {{ Html::script(asset('auth/js/main.js')) }}
    @show
</body>
</html>