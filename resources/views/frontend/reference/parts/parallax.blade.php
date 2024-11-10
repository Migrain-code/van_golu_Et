<div class="section-xl bg-image parallax" data-bg-src="/frontend/assets/images/sample/slider/1.jpg">
    <div class="bg-dark-06">
        <div class="container text-center">
            @php
                $title = trans("Referanslar");
                if (isset($category)){
                    $title = $category->getName();
                }
            @endphp
            <h1 class="fw-normal m-0">{{$title}}</h1>
            <ul class="list-inline-dash">
                <li><a href="/">{{__('Anasayfa')}}</a></li>
                <li><a href="{{route('reference.index')}}">{{__('Referanslar')}}</a></li>
                @if(isset($category))
                    <li><a href="{{route('reference.category', $category->getSlug())}}">{{$category->getName()}}</a></li>
                @endif
            </ul>
        </div><!-- end container -->
    </div>
</div>
