@extends('layouts.app')
@section('content_outer')
<div class="container-fluid page-wrapper" style="background-color: #a9d6d4;">
    <div style="max-width: 400px; border-radius: 5px; box-shadow: 5px 5px 5px rgba(0, 0, 0, .1), 5px -5px 5px rgba(0, 0, 0, .1), -5px 5px 5px rgba(0, 0, 0, .1), -5px -5px 5px rgba(0, 0, 0, .1); background-color: #ffffff; margin: 50px auto; padding: 10px 30px; text-align: center">
        <h3 style="color: #05559a; font-weight: bold; margin-bottom: 30px">Giriş</h3>
        <form action="{{route('login')}}" method="POST">
            @csrf
            <div class="form-group">
                <input type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                       required autocomplete="email" autofocus
                       placeholder="@lang('auth.login_placeholder') *" name="email" value="{{old('email')}}"
                       style="text-align: center; background-color: #ebeff0; border: none; box-shadow: none; height: 45px">
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                @endif
            </div>
            <div class="form-group">
                <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                       placeholder="@lang('auth.password')" name="password"
                       style="text-align: center; background-color: #ebeff0; border: none; box-shadow: none; height: 45px">
                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                @endif
            </div>
            <div>
                <input type="submit" class="form-control" value="Gir" style="background-color: #187f7e; color: #ffffff; height: 45px">
            </div>
            <a href="{{route('password.request')}}" style="text-decoration: underline; margin: 20px 0; color: #000000; display: block">@lang('auth.forget_password')</a>
        </form>
    </div>
</div>
@endsection