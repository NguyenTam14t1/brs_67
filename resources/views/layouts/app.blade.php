<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@lang('lang.title')</title>

        @section('css')
            <!-- Styles -->
            {{ Html::style(asset('css/app.css')) }}
        @show
    </head>
    <body>
        <div id="app">
            <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
                <div class="container">
                    <a class="navbar-brand" href="{{ route('login') }}">
                        @lang('lang.title')
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
                                    <a class="nav-link" href="{{ route('login') }}">@lang('login.title_login')</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">@lang('register.title_register')</a>
                                </li>
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a id="logout" class="dropdown-item" href="{{ route('logout') }}">
                                            @lang('login.btn_logout')
                                        </a>

                                        {{ Form::open(['route' => 'logout', 'id' => 'logout-form']) }}
                                        {{ Form::close() }}
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
                
            @include('layouts.partials._notifications')
            
            <main class="py-4">
                @yield('content')
            </main>
        </div>
        @section('js')
            {{ Html::script(asset('js/app.js')) }}
            {{ Html::script(asset('auth/js/logout.js')) }}
        @show
    </body>
</html>
