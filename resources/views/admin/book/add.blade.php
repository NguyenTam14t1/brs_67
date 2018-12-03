@extends('templates.admin.master')

@section('title')
	
@endsection

@section('content')
	<div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">@lang('admin.btn_add')</h4>
                        </div>
                        @include('common.errors')
                        <div class="content">
                                {{ Form::open(['route' => 'manager-book.store']) }}
                                    <div class="row">
                                        @if (isset($requestBook))
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>@lang('lang.book_title')</label>
                                                    {{ Form::text('title', $requestBook->title, ['class' => 'form-control border-input']) }}
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>@lang('lang.category')</label>
                                                    {{ Form::select('category_id', $allCategories, $requestBook->category_id, [
                                                        'class' => 'form-control select-search  border-input'
                                                    ]) }}
                                                </div>
                                            </div>
                                        @else
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>@lang('lang.book_title')</label>
                                                    {{ Form::text('title', '', ['class' => 'form-control border-input']) }}
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>@lang('lang.category')</label>
                                                    {{ Form::select('category_id', $allCategories, null, [
                                                        'placeholder' => trans('lang.plh_select_category'), 
                                                        'class' => 'form-control select-search  border-input'
                                                    ]) }}
                                                </div>
                                            </div>
                                        @endif
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>@lang('lang.author')</label>
                                                {{ Form::text('author', '', ['class' => 'form-control border-input']) }}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>@lang('lang.publish_date')</label>
                                                {{ Form::date('publish_date', '', ['class' => 'form-control border-input']) }}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>@lang('lang.introduction')</label>
                                                {{ Form::textarea('introduction', '', ['class' => 'form-control border-input']) }}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>@lang('lang.content')</label>
                                                {{ Form::textarea('content', '', ['class' => 'form-control border-input']) }}
                                                
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="text-center">
                                        {{ Form::submit(trans('lang.btn_submit'), ['class' => 'btn btn-info btn-fill btn-wd']) }}
                                        <a class="btn btn-info btn-fill btn-wd" href="{{ route('manager-book.index') }}">@lang('lang.exit')</a>
                                    </div>
                                    <div class="clearfix"></div>
                                {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
