<!-- Blog section -->
<div class="section">
    <div class="container">
        <div class="mb-5">
            <div class="row align-items-end">
                <div class="col-12 col-sm-6">
                    <h2 class="m-0">{{__('Bloglarımız')}}</h2>
                </div>
                <div class="col-12 col-sm-6 text-sm-end">
                    <a class="button-text-1" href="{{route('blog.index')}}">{{ __('Tüm Bloglar') }}</a>
                </div>
            </div>
        </div>
        <div class="owl-carousel owl-nav-overlap" data-owl-nav="true" data-owl-margin="30" data-owl-xs="1" data-owl-sm="1" data-owl-md="1" data-owl-lg="2" data-owl-xl="2" data-owl-autoPlay="true">
            @foreach($blogs as $blog)
                <div class="hoverbox-4 bottom border-radius">
                    <img src="{{image($blog->image)}}" alt="">
                    <div class="content">
                        <h5>{{$blog->getName()}}</h5>
                        <p>
                           {!! \Illuminate\Support\Str::limit(strip_tags($blog->getContent()), 180) !!}
                        </p>
                    </div>
                    <div class="hover-content">
                        <a class="button button-lg button-outline-white button-rounded" href="{{route('blog.detail', $blog->getSlug())}}">{{ __('İncele') }}</a>
                    </div>
                </div>
            @endforeach
            <!-- Blog post -->


        </div>
    </div><!-- end container -->
</div>
<!-- end Blog section -->
