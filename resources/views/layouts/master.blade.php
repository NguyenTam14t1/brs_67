<!DOCTYPE html>
<html lang="zxx" class="no-js">
    <head>
        <!-- Mobile Specific Meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Author Meta -->
        <meta name="author" content="colorlib">
        <!-- Meta Description -->
        <meta name="description" content="">
        <!-- Meta Keyword -->
        <meta name="keywords" content="">
        <!-- meta character set -->
        <meta charset="UTF-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Site Title -->
        <title>{{ trans('lang.title') }}</title>

        <!-- CSS ============================================= -->       
        @section('css')
            {{ Html::style('//fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700') }}
            {{ Html::style('books/css/linearicons.css') }}
            {{ Html::style('books/css/font-awesome.min.css') }}
            {{ Html::style('books/css/bootstrap.css') }}
            {{ Html::style('books/css/magnific-popup.css') }}
            {{ Html::style('books/css/nice-select.css') }}
            {{ Html::style('books/css/animate.min.css') }}
            {{ Html::style('books/css/owl.carousel.css') }}
            {{ Html::style('books/css/jquery-ui.css') }}
            {{ Html::style('books/css/main.css') }}
        @show
    </head>
    <body>
        <!-- content -->

        @include('layouts.header')

        @yield('content')

        @include('layouts.footer')

        <!-- End content -->

        <!-- js -->
        
        @section('js')
            {{ Html::script('books/js/vendor/jquery-2.2.4.min.js') }}
            {{ Html::script('//cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous') }}
            {{ Html::script('books/js/vendor/bootstrap.min.js') }}
            {{ Html::script('//maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA') }}
            {{ Html::script('books/js/easing.min.js') }}
            {{ Html::script('books/js/hoverIntent.js') }}
            {{ Html::script('books/js/superfish.min.js') }}
            {{ Html::script('books/js/jquery.ajaxchimp.min.js') }}
            {{ Html::script('books/js/jquery.magnific-popup.min.js') }}
            {{ Html::script('books/js/mn-accordion.js') }}
            {{ Html::script('books/js/jquery-ui.js') }}
            {{ Html::script('books/js/jquery.nice-select.min.js') }}
            {{ Html::script('books/js/owl.carousel.min.js') }}
            {{ Html::script('books/js/mail-script.js') }}
            {{ Html::script('books/js/main.js') }}
        @show
    </body>
</html>
