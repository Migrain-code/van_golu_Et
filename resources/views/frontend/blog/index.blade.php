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
@section('styles')
    <style>
        .page-item:last-child .page-link {
            border-radius: 50% !important;
        }
        .page-item:first-child .page-link {
            border-radius: 50% !important;
        }
        .pagination {
            gap: 10px;
        }
        .page-link {
            position: relative;
            display: flex;
            color: #de2312;
            text-decoration: none;
            background-color: #fff;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            font-size: 17px;
            justify-content: center;
            align-items: center;
            border: 1px solid #dee2e6;
            transition: color .15sease-in-out, background-color .15sease-in-out, border-color .15sease-in-out, box-shadow .15sease-in-out;
        }
        .page-item.active .page-link {
            z-index: 3;
            color: #fff;
            background-color: #de2312;
            border-color: #de2312;
        }
        .page-link:hover {
            color: #de2312;
        }
    </style>
@endsection
@section('content')

    <!-- breadcrumb-area -->
    <section class="breadcrumb-area tg-motion-effects breadcrumb-bg" data-background="/frontend/assets/img/bg/h3_product_bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-content">
                        <h2 class="title">{{__('Tüm Bloglar')}}</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">{{__('Anasayfa')}}</a></li>
                                <li class="breadcrumb-item active"  aria-current="page"><a href="{{route('blog.index')}}">{{__('Tüm Bloglar')}}</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->

    <!-- blog-area -->
    <section class="blog-area blog-bg" data-background="assets/img/bg/blog_bg.jpg">
        <div class="container custom-container-five">
            <div class="blog-inner-wrap">
                <div class="row justify-content-center">
                    @include('frontend.blog.parts.list')
                    <div class="col-lg-4 col-md-8">
                        <div class="blog-sidebar">

                            @include('frontend.blog.parts.category')
                            @include('frontend.blog.parts.popular')


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- blog-area-end -->
@endsection
