
<!-- blog-post-area -->
<section class="blog-post-area-two">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title title-style-two text-center mb-70">
                    <span class="sub-title">{{__('Bloglarımız')}}</span>
                    <h2 class="title">{{ __('Tüm Bloglar') }}</h2>
                    <div class="title-shape" data-background="/frontend/assets/img/images/title_shape.png"></div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            @foreach($blogs as $blog)
            <div class="col-lg-4 col-md-6">
                <div class="blog-post-item blog-post-item-two">
                    <div class="blog-post-thumb">
                        <a href="{{route('blog.detail', $blog->getSlug())}}"><img src="{{image($blog->image)}}" alt=""></a>
                    </div>
                    <div class="blog-post-content">
                        <div class="blog-meta">
                            <ul class="list-wrap">
                                <li><a href="{{route('blog.detail', $blog->getSlug())}}"><i class="fas fa-clock"></i>{{$blog->created_at->diffForHumans()}}</a></li>
                            </ul>
                        </div>
                        <h4 class="title"><a href="{{route('blog.detail', $blog->getSlug())}}">{{$blog->getName()}}</a></h4>
                        <p>{!! \Illuminate\Support\Str::limit(strip_tags($blog->getContent()), 180) !!}</p>
                        <div class="blog-post-bottom">
                            <a href="{{route('blog.detail', $blog->getSlug())}}" class="link-btn">{{ __('İncele') }}</a>
                            <a href="{{route('blog.detail', $blog->getSlug())}}" class="link-arrow"><i class="fas fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- blog-post-area-end -->

