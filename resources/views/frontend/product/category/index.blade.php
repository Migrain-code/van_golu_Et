@extends('frontend.layouts.master')
@php
    if(isset($category)){
        $title = $category->getMetaTitle();
        $description = $category->getMetaDescription();
    } else{
        $title = 'Ürünler';
        $description = 'Ürünler';
    }
@endphp
@section('title', $title)
@section('description', $description)
@section('styles')
    <style>
        .shop-inner-wrap {
            padding: 120px 90px 70px;
            background: transparent;
        }
        .shop-ordering select {
            background: white;
        }
    </style>
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
    <section class="breadcrumb-area tg-motion-effects breadcrumb-bg" data-background="/frontend/assets/img/bg/breadcrumb_bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-content">
                        <h2 class="title">{{__('Ürünler')}}</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">{{__('Anasayfa')}}</a></li>
                                @if(isset($category))
                                    <li class="breadcrumb-item"><a href="{{route('product.index')}}">{{__('Ürünler')}}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        {{$category->getName()}}
                                    </li>


                                @else
                                    <li class="breadcrumb-item active" aria-current="page">{{__('Ürünler')}}</li>
                                @endif

                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->

    <!-- shop-area -->
    <section class="shop-area shop-bg" data-background="/frontend/assets/img/bg/shop_bg.jpg">
        <div class="container custom-container-five">
            <div class="shop-inner-wrap">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="shop-top-wrap">
                            <div class="row align-items-center justify-content-center">
                                <div class="col-md-12">
                                    <div class="shop-showing-result">
                                        <h3>{{__('Tüm Ürünler')}}</h3>
                                        <p>{{__('En taze ve kaliteli et çeşitlerimizi keşfedin! Günlük olarak hazırlanan ürünlerimizle sofralarınıza lezzet katın.')}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="shop-item-wrap">
                            <div class="row justify-content-center">
                                @foreach($products as $product)
                                    @php
                                      $link = route('product.detail', $product->getSlug());
                                    @endphp
                                    <div class="col-xl-3 col-lg-4 col-md-6">
                                        <div class="product-item-three inner-product-item">
                                            <div class="product-thumb-three">
                                                <a href="{{$link}}"><img src="{{image($product->image)}}" style="border-radius: 20px" alt=""></a>
                                                <span class="batch"><i class="fas fa-star"></i></span>
                                            </div>
                                            <div class="product-content-three">
                                                <a href="{{$link}}" class="tag"></a>
                                                <h2 class="title"><a href="{{$link}}">{{$product->getName()}}</a></h2>
                                            </div>
                                            <div class="product-shape-two">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 303 445" preserveAspectRatio="none">
                                                    <path d="M319,3802H602c5.523,0,10,5.24,10,11.71l-10,421.58c0,6.47-4.477,11.71-10,11.71H329c-5.523,0-10-5.24-10-11.71l-10-421.58C309,3807.24,313.477,3802,319,3802Z" transform="translate(-309 -3802)" />
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                                <div class="col-12 d-flex justify-content-center">
                                    {!! $products->links() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- shop-area-end -->
@endsection

@section('scripts')

@endsection
