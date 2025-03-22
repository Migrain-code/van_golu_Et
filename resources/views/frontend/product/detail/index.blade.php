@extends('frontend.layouts.master')
@php
   $title = $product->getMetaTitle();
   $descripton = $product->getMetaDescription();
@endphp
@section('title', $title)
@section('description', $descripton)
@section('styles')
    <style>
        tbody, td, tfoot, th, thead, tr {
            border: 1px solid #565674FF !important;
            padding: 5px;
        }
    </style>
@endsection
@section('content')
    <!-- breadcrumb-area -->
    <section class="breadcrumb-area tg-motion-effects breadcrumb-bg" data-background="/frontend/assets/img/bg/breadcrumb_bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-content">
                        <h2 class="title">{{__('Ürün Detayı')}}</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">{{__('Anasayfa')}}</a></li>
                                <li class="breadcrumb-item"><a href="{{route('product.index')}}">{{__('Ürünler')}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{__('Ürün Detayı')}}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->

    <!-- shop-details-area -->
    <section class="shop-details-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="shop-details-images-wrap">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane show active" id="itemOne-tab-pane" role="tabpanel" aria-labelledby="itemOne-tab" tabindex="0">
                                <a href="{{image($product->image)}}" class="popup-image">
                                    <img src="{{image($product->image)}}" alt="" style="width: 600px;height: 500px;object-fit: cover">
                                </a>
                            </div>

                        </div>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="itemOne-tab" data-bs-toggle="tab" data-bs-target="#itemOne-tab-pane" type="button" role="tab" aria-controls="itemOne-tab-pane" aria-selected="true">
                                    <img src="{{image($product->image)}}" alt="">
                                </button>
                            </li>

                        </ul>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shop-details-content">
                        <h2 class="title">{{$product->getName()}}</h2>
                        <div class="review-wrap">
                            <div class="rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <span>({{rand(1, 100)}} {{__('Müşteri Yorumu')}})</span>
                        </div>
                        {{--  <h4 class="price">{{formatPrice($product->price)}}</h4> --}}
                        <p>{{$product->getDescription()}}</p>

                        <div class="sd-sku">
                            <span class="title">SKU:</span>
                            <a href="#">#{{$product->id}}</a>
                        </div>
                        <div class="sd-category">
                            <span class="title">{{__('Kategori')}}:</span>
                            <ul class="list-wrap">
                                <li><a href="#">{{$product->category->getName()}}</a></li>
                            </ul>
                        </div>
                        <div>
                            {!! $product->getAdvantage() !!}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- shop-details-area-end -->

    <!-- product-area -->
    <section class="related-product-area pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center mb-50">
                        <span class="sub-title">{{__('Organik Ürünler')}}</span>
                        <h2 class="title">{{__('İlgili Ürünler')}}</h2>
                        <div class="title-shape" data-background="assets/img/images/title_shape.png"></div>
                    </div>
                </div>
            </div>
            <div class="product-item-wrap-three">
                <div class="row justify-content-center rp-active">
                    @foreach($product->category->products as $productItem)
                        <div class="col-xl-3">
                            <div class="product-item-three inner-product-item">
                                <div class="product-thumb-three">
                                    <a href="{{route('product.detail', $productItem->getSlug())}}"><img src="{{image($productItem->image)}}" style="border-radius: 20px" alt=""></a>
                                    <span class="batch"><i class="fas fa-star"></i></span>
                                </div>
                                <div class="product-content-three">
                                    <a href="{{route('product.category', $productItem->category->getSlug())}}" class="tag">{{$productItem->category->getName()}}</a>
                                    <h2 class="title"><a href="{{route('product.detail', $productItem->getSlug())}}">{{$productItem->getName()}}</a></h2>
                                    {{--  <h4 class="price">{{formatPrice($product->price)}}</h4> --}}
                                </div>
                                <div class="product-shape-two">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 303 445" preserveAspectRatio="none">
                                        <path d="M319,3802H602c5.523,0,10,5.24,10,11.71l-10,421.58c0,6.47-4.477,11.71-10,11.71H329c-5.523,0-10-5.24-10-11.71l-10-421.58C309,3807.24,313.477,3802,319,3802Z" transform="translate(-309 -3802)" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>
        </div>
    </section>
    <!-- product-area-end -->
@endsection

@section('scripts')
@endsection
