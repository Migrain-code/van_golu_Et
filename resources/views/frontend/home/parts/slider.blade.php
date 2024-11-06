<!-- Hero section -->
<div class="owl-carousel owl-nav-overlay owl-dots-overlay" data-owl-nav="true" data-owl-dots="true" data-owl-items="1">
    @foreach($sliders as $slider)
        <!-- Slider box -->
        <div class="bg-image" data-bg-src="{{image($slider->image)}}">
            <div class="section-xl bg-dark-03">
                <div class="container text-center">
                    <div class="row g-4">
                        <div class="col-12 col-sm-10 offset-sm-1">
                            <h1 class="fw-bold letter-spacing-1">
                                {{$slider->getTitle()}}
                            </h1>
                            <h5 class="fw-normal mb-4 text-white">
                                {{$slider->getDescription()}}
                            </h5>

                            <a class="button button-xl button-radius button-outline-white mt-3 button-font-2" href="{{$slider->getButtonLink()}}" target="_blank">{{$slider->getButtonText()}}</a>
                        </div>
                    </div><!-- end row -->
                </div><!-- end container -->
            </div>
        </div>
        <!-- Slider box end-->
    @endforeach

</div>
<!-- end owl-carousel -->
