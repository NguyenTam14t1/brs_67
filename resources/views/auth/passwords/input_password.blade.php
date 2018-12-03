<div class="form-group row">
    {{ Form::label('password', trans('login.lb_password'), ['class' => 'col-sm-4 col-form-label text-md-right']) }}
    <div class="col-md-6">
        {{ Form::password('password', ['id' => 'password', 'class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : ''),
        'required' => 'required', 'autofocus' => 'autofocus']) }}

        @if ($errors->has('password'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>
</div>
