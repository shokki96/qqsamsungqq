<div class="col-lg-6 col-md-6 col-sm-6">
    <a href="{{route('material',$material->id)}}">
        <div class="video-poster" style="background-image: url({{asset('uploads/'.$material->banner_url)}}); background-size: cover; background-position: center, center; height: 230px">
            <span class="eye-eye"><i class="fa fa-eye"></i> {{$material->view}}</span>
            <span class="day-day">{{$material->created_at}}</span>
            <span class="like-clicked counter-anim" style="position: absolute; width: 75px; bottom: 0;"><i class="fa fa-heart-o"></i> {{$material->like}}</span>
            <span class="min-min"><i class="fa fa-clock-o"></i> {{$material->duration}} <i style="font-size: 12px; font-style: normal; font-weight: normal">@lang('content.min')</i></span>
            <img class="bg-gradient" src="{{asset('static/img/tv-projects/shadow.png')}}">
            <img class="play-icon" src="{{asset('static/img/tv-projects/play-btn.png')}}">
        </div>
    </a>
    <div class="video-title">
        <a href="">
            <h4>{{$material->title}}</h4>
        </a>
    </div>
</div>