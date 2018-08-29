<header>
    <div class="container main-menu" id="main-menu">
        <div class="row align-items-center justify-content-between">
            <nav id="nav-menu-container">
                <ul class="nav-menu">
                    <li class="menu-active"><a href="{{ route('book.index') }}">@lang('lang.home')</a></li>
                    @foreach ($categories as $category)
                        <li><a href="{{ route('category.show', $category->id) }}">{{ $category->name }}</a></li>
                    @endforeach
                <li><a href="#">@lang('lang.contact')</a></li>
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">@lang('login.title_login')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">@lang('register.title_register')</a>
                    </li>
                @else
                    <li><a href="{{ route('request-book.index') }}">@lang('lang.request')</a></li>
                    <li class="menu-has-children">
                        <a href="#">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <ul>
                            <li>
                                <a id="logout" href="{{ route('logout') }}">
                                    @lang('login.btn_logout')
                                </a>
                            </li>
                        </ul>
                    </li>
                    
                    {{ Form::open(['route' => 'logout', 'id' => 'logout-form']) }}
                    {{ Form::close() }}
                @endguest
            </ul>
            </nav><!-- #nav-menu-container -->
            <div class="navbar-right">
                {{ Form::open(['class' => 'search']) }}
                    {{ Form::text('search_box', null, ['id' => 'search-box', 'class' => 'form-control search-box', 'placeholder' => trans('lang.search')]) }}
                    {!! Html::decode(Form::label('search-box', '<span class="lnr lnr-magnifier"></span>', ['class' => 'search-box-label'])) !!}
                    <span class="search-close">
                        <span class="lnr lnr-cross"></span>
                    </span>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</header>
