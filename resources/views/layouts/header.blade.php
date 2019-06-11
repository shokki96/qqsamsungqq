<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('static/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('static/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('static/css/simple-line-icons.css')}}">
    <link rel="stylesheet" href="{{asset('static/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('static/css/media.css')}}">
    <link rel="stylesheet" href="{{asset('static/css/menu.css')}}">
    <link rel="stylesheet" href="{{asset('static/css/menumedia.css')}}">
    <link rel="stylesheet" href="{{asset('static/css/sass_style.css')}}">

    @yield('afterHead')
</head>
<body>
<header class="container-fluid">
    <div class="year-name" style="text-align: center; padding: 0; margin: 0; margin-top: -12px">
        <h2 style="color: #187f7e; font-weight: bold; ">2019-njy ýyl "Türkmenistan - rowaçlygyň Watany" ýyly</h2>
    </div>
    <div class="container-fluid header-menu desktop">
        <div class="row">
            <div class="header-menu-top-part">
                <ul>
                    <li><a href="/"><img src="{{asset('static/img/home.png')}}"></a></li>
                </ul>
                <ul class="bottom-left-menu">

                    @foreach($topMenus as $topMenu)
                        <li><a href="{{route('menuLinkWeb', $topMenu->id)}}">{{ $topMenu->name }}</a></li>
                    @endforeach
                </ul>
                @guest
                <li class="pull-right" style="list-style: none; color: #ffffff; margin-top: 5px; margin-left: 10px; background-color: #2b9996; padding: 3px 10px; border-radius: 4px;">
                    <a href="{{route('register')}}" style="color: #ffffff">{{__('Ýazylmak')}}</a>
                </li>
                <li class="pull-right" style="list-style: none; color: #ffffff; margin-top: 5px; margin-left: 10px; background-color: #2b9996; padding: 3px 10px; border-radius: 4px;">
                    <a href="{{route('login')}}" style="color: #ffffff">{{__('Giriş')}}</a>
                </li>
                @endguest
                @auth
                    <li class="pull-right dropdown user-dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" style="color: #ffffff">{{auth()->user()->name}} <i class="fa fa-angle-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{route('profile')}}" style="padding: 8px">Şahsy maglumatlar <i class="fa fa-angle-right pull-right" style="margin-top: 4px"></i></a></li>
                            <li><a href="{{route('bought')}}" style="padding: 8px">Satyn alynanlar <i class="fa fa-angle-right pull-right" style="margin-top: 4px"></i></a></li>
                            <li><a href="{{route('liked')}}" style="padding: 8px">Halananlar <i class="fa fa-angle-right pull-right" style="margin-top: 4px"></i></a></li>
                            <li><a href="{{route('watched')}}" style="padding: 8px">Seredilenler <i class="fa fa-angle-right pull-right" style="margin-top: 4px"></i></a></li>
                            <li><a onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();" style="padding: 8px">Çykyş <i class="fa fa-angle-right pull-right" style="margin-top: 4px"></i></a></li>
                        </ul>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @endauth
                <ul class="bottom-right-menu pull-right" style="margin: 0; margin-top: 9px; padding: 0; display: inline-block;">
                    <div class="dropdown" style="display: inline-block">
                        <li style="color: #ffffff; padding-right: 15px">
                            <a class="dropbtn" onclick="myDropdownFunc()" style="color: #ffffff;"><i class="icon-globe" style="display: inline-block"></i>&nbsp;&nbsp; TKM</a>
                        </li>
                        <div class="dropdown-content" id="myDropdown" style="right: 0">
                            <a href="#">ENG <i class="fa fa-angle-right pull-right" style="display: inline-block;"></i></a>
                            <a href="#">RUS <i class="fa fa-angle-right pull-right" style="display: inline-block;"></i></a>
                            <a href="#">TKM <i class="fa fa-angle-right pull-right" style="display: inline-block;"></i></a>
                        </div>
                    </div>
                </ul>
            </div>
            <div class="header-menu-bottom-part">
                <ul class="bottom-right-menu pull-right">
                    <li>
                        <form action="{{route('search')}}">

                            <input class="spannn" type="text" name="key" placeholder="Gözleg">
                            <span><i class="fa fa-search" style="color: #ffffff; font-size: 16px;"></i></span>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>



</header>