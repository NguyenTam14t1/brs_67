<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
	    <title>@yield('title', trans('lang.title'))</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @routes()
        <!-- css  -->
        @section('css')
            {{ Html::style('admin/assets/css/bootstrap.min.css') }}
            {{ Html::style('admin/assets/css/animate.min.css') }}
            {{ Html::style('admin/assets/css/paper-dashboard.css') }}
            {{ Html::style('admin/assets/css/demo.css') }}
            {{ Html::style('admin/assets/css/themify-icons.css') }}
        @show
	</head>
	<body>
		<div class="wrapper">

			@include('templates.admin.left_bar')

			<div class="main-panel">

				@include('templates.admin.header')

				@yield('content')

				@include('templates.admin.footer')
			
    		</div>
		</div>
	</body>

	<!-- js -->
        
        @section('js')
            {{ Html::script('admin/assets/js/jquery-1.10.2.js') }}
            {{ Html::script('admin/assets/js/bootstrap.min.js') }}
            {{ Html::script('admin/assets/js/paper-dashboard.js') }}
            {{ Html::script('admin/assets/js/demo.js') }}
    		{{ Html::script('admin/assets/js/AdminAjax.js') }}
        @show
</html>
			
