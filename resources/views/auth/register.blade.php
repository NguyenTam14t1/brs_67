@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">@lang('register.title_register')</div>

                    <div class="card-body">
                        {{ Form::open(['route' => 'register', 'aria-label' => trans('register.alb_register')]) }}
                            <div class="form-group row">
                                {{ Form::label('name', trans('register.lb_name'), ['class' => 'col-sm-4 col-form-label text-md-right']) }}
                                <div class="col-md-6">
                                    {{ Form::text('name', old('name'), ['id' => 'name', 'class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''),
                                    'required' => 'required', 'autofocus' => 'autofocus']) }}

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

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
                                    {{ Form::submit(trans('register.btn_register'), ['class' => 'btn btn-primary']) }}
                                </div>
                            </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
