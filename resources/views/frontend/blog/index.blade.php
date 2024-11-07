@extends('frontend.layouts.master')
@section('content')
    <!-- end Header -->
    <div class="section-xl bg-image parallax section-divider-curve-bottom" data-bg-src="/frontend/assets/images/sample/slider/1.jpg">
        <div class="bg-dark-06">
            <div class="container text-center">
                <h1 class="fw-normal m-0">{{__('Tüm Bloglar')}}</h1>
                <ul class="list-inline-dash">
                    <li><a href="#">{{$blogs->count()}} {{__('Blog')}}</a></li>
                    @if(isset($category))
                        <li><a href="#">{{$category->getName()}}</a></li>
                    @endif
                </ul>
            </div><!-- end container -->
        </div>
    </div>
    <!-- Blog section  -->
    <div class="section">
        <div class="container">
            <div class="row g-5">
                <!-- Blog Posts -->
                @include('frontend.blog.parts.list')
                <!-- end Blog Posts -->

                <!-- Blog Sidebar -->
                <div class="col-12 col-lg-4 d-none d-lg-block">
                    {{--
                         <!-- Sidebar box 1 - About me -->
                    @include('frontend.blog.parts.author')
                    <!-- Sidebar box 2 - Categories -->
                    --}}
                    @include('frontend.blog.parts.category')
                    <!-- Sidebar box 3 - Popular Posts -->
                    @include('frontend.blog.parts.popular')
                    <!-- Sidebar box 6 - Facebook Like box -->
                    <div class="border p-4 mb-4 text-center">
                        <h6 class="font-small fw-medium uppercase mb-4">{{__('Takip Edin')}}</h6>
                        <ul class="list-inline">
                            <li><a href="{{setting('speed_facebook_url')}}"><i class="bi bi-facebook"></i></a></li>
                            <li><a href="{{setting('speed_twitter_url')}}"><i class="bi bi-twitter-x"></i></a></li>
                            <li><a href="{{setting('speed_instagram_url')}}"><i class="bi bi-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
                <!-- end Blog Sidebar -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div>
    <!-- end Blog section -->
@endsection
