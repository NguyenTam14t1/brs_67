@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">@lang('passwords.reset_password')</div>

                    <div class="card-body">
                        {{ Form::open(['route' => 'password.request', 'aria-label' => trans('password.reset_password')]) }}
                            @include('auth.passwords.input_email')
                            @include('auth.passwords.input_password')
                            <div class="form-group row">
                                {{ Form::label('password-confirm', trans('register.lb_confirm_password'), ['class' => 'col-sm-4 col-form-label text-md-right']) }}

                                <div class="col-md-6">
                                    {{ Form::password('password_confirmation', ['id' => 'password-confirm', 'class' => 'form-control', 'required' => 'required']) }}
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    {{ Form::submit(trans('passwords.reset_password'), ['class' => 'btn btn-primary']) }}
                                </div>
                            </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
