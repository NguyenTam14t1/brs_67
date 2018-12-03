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
