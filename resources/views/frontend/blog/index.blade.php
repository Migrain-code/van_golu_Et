@extends('frontend.layouts.master')
@php
    $title = trans("Tüm Bloglar");
    $description = trans("Tüm Bloglar");
    if (isset($category)){
        $title = $category->getMetaTitle();
        $description = $category->getMetaDescription();
        $image = $category->image;
    } else{
        $image = $categories->first()->image;
    }
@endphp
@section('title', $title)
@section('description', $description)
@section('content')

    <!-- end Header -->
    <div class="section-xl bg-image parallax section-divider-curve-bottom" data-bg-src="{{image($image)}}">
        <div class="bg-dark-06">
            <div class="container text-center">
                <h1 class="fw-normal m-0">{{__('Tüm Bloglar')}}</h1>
                <ul class="list-inline-dash">
                    <li><a href="/">{{__('Anasayfa')}}</a></li>
                    <li><a href="{{route('blog.index')}}">{{__('Tüm Bloglar')}}</a></li>
                    @if(isset($category))
                        <li><a href="{{route('blog.category', $category->getSlug())}}">{{$category->getName()}}</a></li>
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
