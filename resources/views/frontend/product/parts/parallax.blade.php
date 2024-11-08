<div class="section-xl bg-image parallax" data-bg-src="/frontend/assets/images/sample/slider/1.jpg">
    <div class="bg-dark-06">
        <div class="container text-center">
            <h1 class="fw-normal m-0">{{$category->getName()}}</h1>
            <ul class="list-inline-dash">
                <li><a href="/">{{__('Anasayfa')}}</a></li>
                @if(isset($category))
                    <li><a href="{{route('search.category', $category->getSlug())}}">{{$category->getName()}}</a></li>
                @endif
                @if(isset($category) && isset($subCategory))
                    <li><a href="{{route('search.subCategory', [$category->getSlug(), $subCategory->getSlug()])}}">{{$subCategory->getName()}}</a></li>
                @endif
            </ul>
        </div><!-- end container -->
    </div>
</div>
