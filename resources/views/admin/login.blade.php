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
	<title>@lang('login.title_login')</title>

	<!-- CSS ============================================= -->
	@section('css')
		{{ Html::style('auth/css/style.css') }}
	@show
</head>
	<body>
		<!-- main -->
		<div class="main-agileinfo slider ">
			<div class="items-group">
				<div class="item agileits-w3layouts">
					<div class="block text main-agileits">
						<span class="circleLight"></span>

						<!-- login form -->
						<div class="login-form loginw3-agile">
							<div class="agile-row">
								<h1>{{ trans('login.title_login') }}</h1>
								@include('common.errors')
								<div class="login-agileits-top">
									{{ Form::open(['route' => 'admin.login']) }}
										<p>{{ trans('login.lb_email') }}</p>
										{{ Form::text('email', null, ['class' => 'name', 'required' => 'required']) }}
										<p>{{ trans('login.lb_password') }}</p>
										{{ Form::password('password', ['class' => 'password', 'required' => 'required']) }}
										<p></p>
										{{ Form::submit(trans('login.btn_login')) }}
									{{ Form::close() }}
								</div>
							</div>
						</div>

					</div>
					<div class="w3lsfooteragileits">
						<p>@lang('login.copyright')</p>
					</div>
				</div>
			</div>
		</div>
		<!-- //main -->
		@section('js')
			{{ Html::script('auth/js/hideFrm.js') }}
		@show
	</body>
</html>
