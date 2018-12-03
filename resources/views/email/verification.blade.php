@lang('register.content_email')
<a href="{{ route('auth.verify', $token) }}">@lang('register.msg.request_verify')</a>
