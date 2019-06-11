<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
    <ul>
        @foreach($mainCategories as $category)
            <li @if(!empty($cat) && $category->id == $cat->id)class="active" @endif>
                <a href="{{route('category',$category->id)}}">
                    {{$category->name}}</a>
            </li>
        @endforeach

    </ul>
</div>