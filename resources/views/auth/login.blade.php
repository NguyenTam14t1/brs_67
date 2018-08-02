@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ trans('login.title_login') }}</div>

                    <div class="card-body">
                        {{ Form::open(['method' => 'POST', 'route' => 'login', 'aria-label' => trans('login.alb_login')]) }}
                        @csrf

                        <div class="form-group row">
                            {{ Form::label('email', trans('login.lb_email'), ['class' => 'col-sm-4 col-form-label text-md-right']) }}

                            <div class="col-md-6">
                                {{ Form::email('email', old('email'), ['id' => 'email', 'class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''),
                                'required' => 'required', 'autofocus' => 'autofocus']) }}

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            {{ Form::label('password', trans('login.lb_password'), ['class' => 'col-sm-4 col-form-label text-md-right']) }}

                            <div class="col-md-6">
                                {{ Form::password('password',['id' => 'password', 'class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : ''),
                                'required' => 'required', 'autofocus' => 'autofocus']) }}

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

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
                                    {{ trans('login.lb_forgot_pass') }}
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
