@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">@lang('login.title_login')</div>

                    <div class="card-body">
                        {{ Form::open(['route' => 'login', 'aria-label' => trans('login.alb_login')]) }}
                            @include('auth.passwords.input_email')
                            @include('auth.passwords.input_password')
                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        {{ Form::checkbox('remember', old('remember') ? 'checked' : '', ['id' => 'remember', 'class' => 'form-check-input']) }}
                                        {{ Form::label('remember', trans('login.lb_remember'), ['class' => 'form-check-label']) }}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    {{ Form::submit(trans('login.btn_login'), ['class' => 'btn btn-primary']) }}
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        @lang('login.lb_forgot_pass')
                                    </a>
                                </div>
                            </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
