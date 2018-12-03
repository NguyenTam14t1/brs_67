@extends('layouts.master')

@section('content')
    <section class="contact-page-area pt-50 pb-120">
        <div class="container">
            @auth
                <div class="row contact-wrap">
                    <div class="request_area col-lg-11 d-flex flex-column address-wrap">
                        @include('common.errors')
                        <h4>@lang('lang.edit_request')</h4><br>
                        {{ Form::open(['route' => ['request-book.update', $requestBook->id]]) }}
                            {{ method_field('PUT') }}
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>@lang('lang.book_title')</h5>
                                        {{ Form::text('title', $requestBook->title, ['class' => 'form-control border-input']) }}
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>@lang('lang.category')</h5>
                                        {{ Form::select('category_id', $allCategories, $requestBook->category_id, [
                                            'class' => 'form-control select-search  border-input'
                                        ]) }}
                                    </div>
                                </div>
                                
                            </div>
                            <div class="text-center">
                                {{ Form::submit(trans('lang.btn_submit'), ['class' => 'btn btn-info btn-fill btn-wd']) }}
                                <a class="btn btn-info btn-fill btn-wd" href="{{ route('request-book.index') }}">@lang('lang.exit')</a>
                            </div>
                            <div class="clearfix"></div>
                        {{ Form::close() }}

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
