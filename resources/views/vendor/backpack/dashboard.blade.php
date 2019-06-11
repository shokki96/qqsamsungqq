@extends('backpack::layout')

@section('header')
    <link rel="stylesheet" href="{{ asset('/vendor/adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.css') }}">
    <section class="content-header">
        <h1>
            Stats
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ backpack_url() }}">{{ config('backpack.base.project_name') }}</a></li>
            <li class="active">{{ trans('backpack::base.dashboard') }}</li>
        </ol>
    </section>
@endsection


@section('content')
    <div class="row">
        <div class="col-md-9">
            <div class="box box-success box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Category Statistics</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body" style="">
                    <div class="row text-center">

                        <div class="col-xs-offset-4 col-xs-4" >
                            <form id="dateFilter" action="{{backpack_url('dashboard')}}" method="GET">

                                <input class="datepicker-range-start" type="hidden" name="start_date" value="{{ old('start_date')}}">
                                <input class="datepicker-range-end" type="hidden" name="end_date" value="{{ old('end_date') }}">
                                <label>Date Range</label>
                                <div class="input-group date">
                                    <input
                                            data-bs-daterangepicker="{}"
                                            type="text"
                                            @include('crud::inc.field_attributes')
                                    >
                                    <div class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </div>
                                </div>
                            </form>
                            {{-- HINT --}}
                            @if (isset($field['hint']))
                                <p class="help-block">{!! $field['hint'] !!}</p>
                            @endif
                        </div>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Orders count</th>
                            <th>Total sold</th>
                            <th>Views count</th>
                            <th>Likes count</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{$category->name}}</td>
                                <td>{{$category->orders}}</td>
                                <td>{{$category->total}}</td>
                                <td>{{$category->views}}</td>
                                <td>{{$category->likes}}</td>
                                <td><a href="{{route('cat_stats',$category->id)}}">details</a> </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
        <div class="col-md-3">
            <div class="row">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>{{$orders}}</h3>

                        <p>Orders</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-shopping-bag"></i>
                    </div>

                </div>
            </div>

            <!-- ./col -->
            <div class="row">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>{{$users}}</h3>

                        <p>User Registrations</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-user-plus"></i>
                    </div>

                </div>
            </div>
            <!-- ./col -->
            <div class="row">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>{{$views}}</h3>

                        <p>Views</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-eye"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="row">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>{{$like}}</h3>

                        <p>Likes</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-thumbs-up"></i>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
@section('after_scripts')
    <script src="{{ asset('/vendor/adminlte/bower_components/moment/moment.js') }}"></script>
    <script src="{{ asset('/vendor/adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script>
        jQuery(document).ready(function($){
            var $fake = $('[data-bs-daterangepicker]'),
                $start = $fake.parents('.form-group').find('.datepicker-range-start'),
                $end = $fake.parents('.form-group').find('.datepicker-range-end'),
                $customConfig = $.extend({
                    format: 'dd/mm/yyyy',
                    autoApply: true,
                    startDate: moment($start.val()),
                    endDate: moment($end.val())
                }, $fake.data('bs-daterangepicker'));

            $fake.daterangepicker($customConfig);
            $picker = $fake.data('daterangepicker');

            $fake.on('keydown', function(e){
                e.preventDefault();
                return false;
            });

            $fake.on('hide.daterangepicker', function(e, picker){
                // $start.val( picker.startDate.format('YYYY-MM-DD HH:mm:ss') );
                // $end.val( picker.endDate.format('YYYY-MM-DD H:mm:ss') );
                $('input[name=start_date]').val(picker.startDate.format('YYYY-MM-DD'))
                $('input[name=end_date]').val(picker.endDate.format('YYYY-MM-DD'))
                $( "#dateFilter" ).submit();
            });
        });

    </script>
@endsection