<header>       
    <div class="logo-wrap">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-4 col-md-4 col-sm-12 logo-left no-padding">
                    <a href="#">
                        {{ HTML::image('books/img/logo.png', ['class' => 'img-fluid']) }}
                    </a>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 logo-right no-padding ads-banner">
                    {{ HTML::image('books/img/banner-ad.jpg', ['class' => 'img-fluid']) }}
                </div>
            </div>
        </div>
    </div>
    <div class="container main-menu" id="main-menu">
        <div class="row align-items-center justify-content-between">
            <nav id="nav-menu-container">
                <ul class="nav-menu">
                    <li class="menu-active"><a href="index.html">{{ trans('lang.home') }}</a></li>
                    <li><a href="archive.html">{{ trans('lang.categories') }}</a></li>
                    <li><a href="category.html">{{ trans('lang.parent_category') }}</a></li>
                    <ul>
                        <li><a href="standard-post.html">{{ trans('lang.child_category') }}</a></li>
                    </ul>
                </li>
                <li><a href="about.html">{{ trans('lang.about') }}</a></li>
                <li><a href="contact.html">{{ trans('lang.contact') }}</a></li>
            </ul>
            </nav><!-- #nav-menu-container -->
            <div class="navbar-right">
                {{ Form::open(['method' => 'POST', 'route' => '', 'class' => 'search']) }}
                    {{ Form::text('search_box', null, ['id' => 'search-box', 'class' => 'form-control search-box', 'placeholder' => trans('search')]) }}
                    {{ Form::label('search_box', ['class' => 'search-box-label']) }}
                    <span class="lnr lnr-magnifier"></span>
                    <span class="search-close">
                        <span class="lnr lnr-cross"></span>
                    </span>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</header>
