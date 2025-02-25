<!-- Hero section -->
@foreach($sliders as $slider)
<!-- banner-area -->
<section class="banner-area-two tg-motion-effects banner-bg-two" data-background="/frontend/assets/img/banner/h3_banner_bg.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="banner-content-two">
                    <div class="icon wow zoomIn" data-wow-delay=".2s">
                        <img src="/frontend/assets/img/banner/h3_banner_icon.png" alt="" class="rotateme">
                    </div>
                    <h1 class="title wow bounceInRight" data-wow-delay=".4s"> {{$slider->getTitle()}}</h1>
                </div>
                <div class="banner-img-two wow bounceInLeft" data-wow-delay=".6s">
                    <img src="{{image($slider->image)}}" alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="banner-shape-wrap-two">
        <img src="/frontend/assets/img/banner/h3_banner_shape01.png" alt="" class="tg-motion-effects4">
        <img src="/frontend/assets/img/banner/h3_banner_shape02.png" alt="" class="tg-motion-effects5">
        <img src="/frontend/assets/img/banner/h3_banner_shape03.png" alt="">
        <img src="/frontend/assets/img/banner/h3_banner_shape04.png" alt="">
    </div>
</section>
<!-- banner-area-end -->
@endforeach

<!-- category-area -->
<div class="category-area category-bg" data-background="/frontend/assets/img/bg/category_bg.png">
    <div class="container">
        <div class="row justify-content-center row-cols-1 row-cols-lg-5 row-cols-md-3 row-cols-sm-2">
            @foreach($categories as $category)
                <div class="col">
                    <div class="category-item">
                        <a href="{{route('product.category', $category->getSlug())}}">
                            <div class="icon">
                                <img src="{{image($category->image)}}" alt="">
                            </div>
                            {{$category->getName()}}
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- category-area-end -->
