@extends('layouts.app')
@section('content_outer')
<svg class="Rectangle_1" style="position: absolute;
    overflow: visible;
    width: 100%;
    height: 100%;
    left: 0px;
    top: 0px;">
    <linearGradient spreadMethod="pad" id="LinearGradientFill1" x1="0" x2="1" y1="0" y2="1">
        <stop offset="0" stop-color="#f6e1e0" stop-opacity="1"></stop>
        <stop offset="0.17980800569057465" stop-color="#edeef0" stop-opacity="1"></stop>
        <stop offset="1" stop-color="#63bdc8" stop-opacity="1"></stop>
    </linearGradient>
    <rect id="Rectangle_1" rx="0" ry="0" x="0" y="0" style="opacity: 1; width: 100%; height: 100%;
    fill: url(#LinearGradientFill1);">
    </rect>
</svg>

<!-- navbar -->
<nav class="navbar py-3 navbar-light">
    <!-- logo -->
    <a href="#" class="navbar-brand text-uppercase font-italic">
        <img src="{{ asset('assets/img/logo/logo.png')}}">
    </a>
    <div class="collapse navbar-collapse" id="navbarLinks">
        <ul class="navbar-nav float-right">
            <li class="nav-item">
                <a href="" class="nav-link">Galaxy S10e</a>
            </li>
            <li class="nav-item">
                <a href="" class="nav-link">S10</a>
            </li>
            <li class="nav-item">
                <a href="" class="nav-link">S10+</a>
            </li>
        </ul>
    </div>
</nav>
<!-- end of navbar -->

<!-- content -->
<section id="main-page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-7 main-left-part px-5">
                <div class="col-12 form-wrap pl-4 pr-5">
                    <h1 class="py-2" style="font-weight: bold; font-size: 50px">Не упусти свой шанс!</h1>
                    <h3 class="pb-4">Купи любой S10 и получи J260 в подарок</h3>
                <h3 class="pb-4">
                @if(!empty($result) && count($result)>0)
                 {{$result }}
                @endif
                </h3>
                    <form action="{{route('index')}}" id="s-form">
                        <input style="background: none; font-size: 24px; padding-bottom: 10px; width: 100%; border-color: #000000; border-radius: 200px"
                            type="text" class="form-control" placeholder="Проверь свой телефон на участие" name = "q">
                        <a id="a-submit"><i class="icon-magnifier"></i></a>
                    </form>
                </div>
                <div class="col-12 form-footer" style="margin-bottom: 30px">
                    <img src="{{ asset('assets/img/one-year.png')}}">
                    <p class="">Период акции: 07.06.2019 - 30.06.2019</p>
                </div>
            </div>
            <div class="col-lg-5 main-right-part">
                <img src="{{ asset('assets/img/phones.png')}}" width="100%">
            </div>
        </div>
    </div>
</section>
@endsection