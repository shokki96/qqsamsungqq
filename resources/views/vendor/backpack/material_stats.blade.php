@extends('backpack::layout')
@section('header')
    <section class="content-header">
        <h1>
            {{$category->name}} stats
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ backpack_url() }}">{{ config('backpack.base.project_name') }}</a></li>
            <li><a href="{{ route('admin_dashboard') }}">{{ trans('backpack::base.dashboard') }}</a></li>
            <li class="active">{{$category->name}} stats</li>
        </ol>
    </section>
@endsection
@section('content')
    <div class="row">
        <div class="box box-warning box-solid">
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
                        <form id="dateFilter" action="{{route('cat_stats',$category->id)}}" method="GET">

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

                <table class="table table-bordered dataTable" id="dtable">
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>Orders count</th>
                        <th>Total sold</th>
                        <th>Views count</th>
                        <th>Likes count</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($materials as $material)
                        <tr>
                            <td>{{$material->title}}</td>
                            <td>{{$material->orders}}</td>
                            <td>{{$material->total}}</td>
                            <td>{{$material->view}}</td>
                            <td>{{$material->like}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->

        </div>
    </div>

@endsection
@section('after_scripts')
    <link href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.1.5/css/fixedHeader.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.1/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('/vendor/adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.css') }}">
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.1/js/responsive.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script>
    <script>

        $(function () {

            $('#dtable').DataTable({
                'paging'      : true,
                'lengthChange': true,
                'searching'   : true,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : true
            })
        });

    </script>
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