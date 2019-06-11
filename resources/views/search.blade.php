@extends('layouts.app')
@section('breadcrumb')
    {{ Breadcrumbs::render('search') }}
@endsection
@section('content')
    <div class="platny-wrapper col-lg-12 col-md-12 col-sm-12 col-xs-12">
    @include('layouts.left_menu')
    <div class="tab-content col-lg-9 col-md-9 col-sm-9 col-xs-12">
        <div id="redak-tc" class="tab-pane fade active in" role="tabpanel">
            <div class="for-padding">
                <h2>@lang('content.searh_result',['key' => $key])</h2>
                <div class="platny-inner-tab">
                    <ul role="tablist" >
                        <li class="@if($sort == 'new')active @endif">
                            <a href="{{route('search',["key={$key}",'sort=new'])}}" >@lang('content.sort_new')</a>
                        </li>
                        <li class="@if($sort == 'old')active @endif">
                            <a href="{{route('search',["key={$key}",'sort=old'])}}" >@lang('content.sort_old')</a>
                        </li>
                        <li class="@if($sort == 'like')active @endif">
                            <a href="{{route('search',["key={$key}",'sort=like'])}}">@lang('content.liked')</a>
                        </li>
                        <li class="@if($sort == 'view')active @endif" >
                            <a href="{{route('search',["key={$key}",'sort=view'])}}">@lang('content.watched')</a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div id="sere-tc-no" class="tab-pane fade active in container" role="tabpanel">
                            <div class="row">
                                @foreach($materials as $material)
                                    @include('partials.material_list_item')
                                @endforeach
                                @if(!empty($materials))
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        {{ $materials->appends(['sort' => $sort])->links() }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container kesde" style="width: 100%; margin-top: 50px">
        <a href=""><img src="{{asset('static/img/okuz.jpg')}}" alt="" style="width: 100%"></a>
    </div>
    </div>
@endsection