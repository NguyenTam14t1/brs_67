<!-- resources/views/common/errors.blade.php -->

@if (count($errors))
    <!-- Form Error List -->
    <div class="alert alert-danger">
        <strong>@lang('lang.msg.error')</strong>
        <br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if (session('alert'))
    <div class="alert alert-danger">
        <strong>{{ session('alert') }}</strong>
    </div>
@endif
