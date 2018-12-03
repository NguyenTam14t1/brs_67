@extends('templates.admin.master')

@section('title')
	@lang('admin.list_user')
@endsection

@section('content')
	<div class="content">
		<div class="container-fluid">
		    <div class="row">
		        <div class="col-md-12">
		            <div class="card">
		                <div class="header">
		                    <h4 class="title">@lang('admin.list_user')</h4>
		                    @include('common.errors')
		                    {{ Form::open(['method' => 'get']) }}
		                    	<div class="row">
		                            <div class="col-md-4">
		                                <div class="form-group">
		                                    {{ Form::text('search_name', null, ['class' => 'form-control  border-input', 'placeholder' => trans('admin.plh_user_name')]) }}
		                                </div>
		                            </div>
		                            <div class="col-md-4">
		                                <div class="form-group">
		                                    {{ Form::text('search_email', null, ['class' => 'form-control  border-input', 'placeholder' => trans('admin.plh_user_email')]) }}
		                                </div>
		                            </div>
		                            <div class="col-md-4">
		                            	<div class="form-group">
		                            		{{ Form::button(trans('lang.search'), ['class' => 'btn btn-primary select-search', 'id' => 'btn_search_user', 'data-url' => route('search.request.book')]) }}
						                    {{ Form::reset(trans('lang.reset'), ['class' => 'btn btn-primary select-search']) }}
		                                </div>
		                            </div>
		                        </div>
						    {{ Form::close() }}

		                </div>
		                <div class="content table-responsive table-full-width">
		                    <h3 class="title">@lang('admin.result_search')</h3>
		                	<div id="area-list-user">
		                	</div>
		                </div>
		                <hr>
		                <hr>
		                <div class="content table-responsive table-full-width">
		                    <h3 class="title">@lang('admin.all_user')</h3>
		                    @include('admin.user.list_user', ['listUsers' => $listAllUsers])
		                </div>
		            </div>
		        </div>


		    </div>
		</div>
	</div>

@endsection