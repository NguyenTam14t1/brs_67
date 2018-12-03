@extends('templates.admin.master')

@section('title')
	@lang('admin.list_request_book')
@endsection

@section('content')
	<div class="content">
		<div class="container-fluid">
		    <div class="row">
		        <div class="col-md-12">
		            <div class="card">
		                <div class="header">
		                    <h4 class="title">@lang('lang.title_book_request')</h4>
		                    @include('common.errors')
		                    {{ Form::open(['method' => 'get']) }}
		                    	<div class="row">
		                            <div class="col-md-4">
		                                <div class="form-group">
		                                    {{ Form::text('search_box', null, ['class' => 'form-control  border-input', 'placeholder' => trans('lang.plh_request')]) }}
		                                </div>
		                            </div>
		                            <div class="col-md-3">
		                                <div class="form-group">
		                                    {{ Form::select('category_id', $allCategories, null, [
						                        'class' => 'form-control select-search  border-input', 
						                        'placeholder' => trans('lang.plh_select_category')
						                    ]) }}
		                                </div>
		                            </div>
		                            <div class="col-md-4">
		                            	<div class="form-group">
		                            		{{ Form::button(trans('lang.search'), ['class' => 'btn btn-primary select-search', 'id' => 'btn_search_request', 'data-url' => route('search.request.book')]) }}
						                    {{ Form::reset(trans('lang.reset'), ['class' => 'btn btn-primary select-search']) }}
		                                </div>
		                            </div>
		                        </div>
						    {{ Form::close() }}
		                </div>
		                <div class="content table-responsive table-full-width">
		                    <h4 class="title">@lang('admin.result_search')</h4>
		                	<div id="area-list-request">
		                	</div>
		                </div>
		                <hr>
		                <hr>
		                <div class="content table-responsive table-full-width">
		                    <h3 class="title">@lang('admin.all_request')</h3>
		                    @include('admin.request_book.list_request_book', ['listBooks' => $listAllRequestBook])
		                </div>
		            </div>
		        </div>
		    </div>
		</div>
	</div>
@endsection