@extends('templates.admin.master')

@section('title')
    @lang('admin.edit_user')
@endsection

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">@lang('admin.btn_edit')</h4>
                        </div>
                        <div class="content">
                            @include('common.errors')
                            @if (isset($user))
                                {{ Form::open(['route' => ['manager-user.update', $user->id]]) }}
                                    {{ method_field('PUT') }}
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>@lang('admin.user_name')</label>
                                                {{ Form::text('name', $user->name, ['id' => 'name', 'class' => 'form-control border-input']) }}
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>@lang('admin.user_email')</label>
                                                {{ Form::email('email', $user->email, ['id' => 'email', 'class' => 'form-control border-input']) }}
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="text-center">
                                        {{ Form::submit(trans('lang.btn_submit'), ['class' => 'btn btn-info btn-fill btn-wd']) }}
                                        <a class="btn btn-info btn-fill btn-wd" href="{{ route('manager-user.index') }}">@lang('lang.exit')</a>
                                    </div>
                                    <div class="clearfix"></div>
                                {{ Form::close() }}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
