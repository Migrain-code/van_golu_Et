
<div class="section-xl bg-image parallax" data-bg-src="{{image($image)}}">
    <div class="bg-dark-06">
        <div class="container text-center">

            <h1 class="fw-normal m-0">{{$title}}</h1>
            <ul class="list-inline-dash">
                <li><a href="/">{{__('Anasayfa')}}</a></li>
                <li><a href="{{route('production.index')}}">{{__('Üretim Aşamaları')}}</a></li>
                @if(isset($category))
                    <li><a href="{{route('production.category', $category->getSlug())}}">{{$category->getName()}}</a></li>
                @endif
            </ul>
        </div><!-- end container -->
    </div>
</div>
