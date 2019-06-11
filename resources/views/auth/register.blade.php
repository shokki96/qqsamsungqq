@extends('layouts.app')
@section('content_outer')
    <div class="container-fluid page-wrapper" style="background-color: #a9d6d4;">
        <div class="row" style="max-width: 800px;
        border-radius: 5px;
        box-shadow: 5px 5px 5px rgba(0, 0, 0, .1), 5px -5px 5px rgba(0, 0, 0, .1), -5px 5px 5px rgba(0, 0, 0, .1), -5px -5px 5px rgba(0, 0, 0, .1);
        background-color: #ffffff;
        margin: 50px auto;
        padding: 10px 30px;
        text-align: center">
            <h3 style="color: #05559a; font-weight: bold; margin-bottom: 30px">@lang('header.sign_up')</h3>
            <form action="{{route('register')}}" method="POST">
                @csrf
                <div class="form-group col-lg-6 col-md-6" style="padding-left: 10px; padding-right: 10px">
                    <input type="text" class="form-control {{ $errors->has('firstname') ? ' is-invalid' : '' }}"
                           placeholder="@lang('auth.first_name') *" value="{{old('firstname')}}" name="firstname"
                           style="text-align: center; background-color: #ebeff0; border: none; box-shadow: none; height: 45px">
                    @if ($errors->has('firstname'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('firstname') }}</strong>
                                    </span>
                    @endif
                </div>
                <div class="form-group col-lg-6 col-md-6" style="padding-left: 10px; padding-right: 10px">
                    <input type="text" class="form-control {{ $errors->has('firstname') ? ' is-invalid' : '' }}"
                           placeholder="@lang('auth.lastname') *" value="{{old('lastname')}}" name="lastname"
                           style="text-align: center; background-color: #ebeff0; border: none; box-shadow: none; height: 45px">
                    @if ($errors->has('lastname'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                    @endif
                </div>
                <div class="form-group col-lg-6 col-md-6" style="padding-left: 10px; padding-right: 10px">
                    <input type="text" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}"
                           placeholder="@lang('auth.email') *" value="{{old('email')}}" name="email"
                           style="text-align: center; background-color: #ebeff0; border: none; box-shadow: none; height: 45px">
                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif
                </div>
                <div class="form-group col-lg-6 col-md-6" style="padding-left: 10px; padding-right: 10px">
                    <input type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}"
                           placeholder="@lang('auth.phone') *" name="phone" value="{{old('phone')}}"
                           style="text-align: center; background-color: #ebeff0; border: none; box-shadow: none; height: 45px">
                    @if ($errors->has('phone'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                    @endif
                </div>
                <div class="form-group col-lg-6 col-md-6" style="padding-left: 10px; padding-right: 10px">
                    <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                           placeholder="@lang('auth.password') *" name="password"
                           style="text-align: center; background-color: #ebeff0; border: none; box-shadow: none; height: 45px">
                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                    @endif
                </div>
                <div class="form-group col-lg-6 col-md-6" style="padding-left: 10px; padding-right: 10px">
                    <input type="password" name="password_confirmation" class="form-control" placeholder="@lang('auth.confirm') *" style="text-align: center; background-color: #ebeff0; border: none; box-shadow: none; height: 45px">
                </div>
                <div class="form-group col-lg-12 col-md-12">
                    <input type="submit" class="form-control" value="Ýazyl" style="background-color: #187f7e; width: 350px; margin: auto; color: #ffffff; height: 45px">
                    <a href="{{route('login')}}" style="text-decoration: underline; margin: 20px 0; color: #000000; display: block">@lang('auth.registered')</a>
                </div>

            </form>
        </div>
    </div>
@endsection
