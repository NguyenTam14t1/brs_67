<header>       
    <div class="logo-wrap">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-4 col-md-4 col-sm-12 logo-left no-padding">
                    <a href="index.html">
                        <img class="img-fluid" src="{{ asset('/books/img/logo.png') }}" alt="">
                    </a>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 logo-right no-padding ads-banner">
                    <img class="img-fluid" src="{{ asset('/books/img/banner-ad.jpg') }}" alt="">
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
                {{ Form::open(['method' => 'POST', 'class' => 'search']) }}
                    {{ Form::text('search_box', null, ['id' => 'search-box', 'class' => 'form-control search-box', 'placeholder' => trans('search')]) }}
                {{ Form::close() }}
            </div>
        </div>
    </div>
</header>
