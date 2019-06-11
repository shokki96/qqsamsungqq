@extends('layouts.app')
@section('content_outer')
<div class="container-fluid page-wrapper" style="background-color: #a9d6d4; padding: 60px 0">
        <div style="max-width: 400px; border-radius: 5px; box-shadow: 5px 5px 5px rgba(0, 0, 0, .1), 5px -5px 5px rgba(0, 0, 0, .1), -5px 5px 5px rgba(0, 0, 0, .1), -5px -5px 5px rgba(0, 0, 0, .1); background-color: #ffffff; margin: 50px auto; padding: 10px 30px; text-align: center">
            <h3 style="color: #05559a; font-weight: bold; margin-bottom: 30px">@lang('auth.reset_password')</h3>
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="form-group">
                    <input id="email" type="email"
                           class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                           name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                           placeholder="@lang('auth.write_mail') *"
                           style="text-align: center; background-color: #ebeff0; border: none; box-shadow: none; height: 45px">
                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif
                </div>
                <div>
                    <input type="submit" class="form-control" value="@lang('auth.send')"
                           style="background-color: #187f7e; color: #ffffff; height: 45px">
                </div>
                <a href="{{route('register')}}" style="text-decoration: underline; margin: 20px 0; color: #000000; display: block">@lang('auth.first_time')</a>
            </form>
        </div>
</div>

@endsection