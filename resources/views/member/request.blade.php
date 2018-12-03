@extends('layouts.master')

@section('content')
	<section class="contact-page-area pt-50 pb-120">
		<div class="container">
			@auth
				<div class="row contact-wrap">
					<div class="request_area col-lg-3 d-flex flex-column address-wrap">
						{{ Form::open(['request_form', 'method' => 'GET', 'id' => 'request_form']) }}
							<h4>@lang('lang.request')</h4>
							<div class="form-group form-inline">
								<div class="form-group col-lg-6 col-md-6 name">
									@auth
										{{ Form::hidden('user_id', Auth::user()->id, ['id' => 'request_user_id']) }}
									@endauth
								</div>
							</div>
							<div class="form-group form-inline">
								<div class="form-group col-lg-6 col-md-6 name">
									{{ Form::text('title_book', null, ['id' => 'request_title_book', 'class' => 'form-control', 'placeholder' => trans('lang.plh_request'), 'required' => 'required']) }}
						        </div>
						    </div>
							<div class="form-group form-inline">
								<div class="form-group col-lg-6 col-md-6 name">            
						            {{ Form::select('category_id', $allCategories, null, ['id' => 'request_category_id', 'class' => 'form-control select-search', 'placeholder' => trans('lang.plh_select_category')]) }}
								</div>
							</div>
							<div class="form-group form-inline">
								<div class="form-group col-lg-6 col-md-6 name">            
									{{ Form::button(trans('lang.btn_submit'), ['class' => 'primary-btn text-uppercase', 'id' => 'btn_request_form', 'data-url' => route('get.request')]) }}
								</div>
							</div>
						{{ Form::close() }}
					</div>
					<div class="col-lg-8" id="list_request">
	                    @include('common.errors')
						@if (count($listRequestBook))
							@include('member.list_request')
		                @endif
					</div>
				</div>
			@else
				<h2>@lang('login.msg.request_login')
                	<a class="nav-link" href="{{ route('login') }}">@lang('login.title_login')</a>
            	</h2>
			@endauth
		</div>
	</section>
@endsection
