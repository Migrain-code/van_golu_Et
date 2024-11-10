@extends('frontend.layouts.master')
@php
   $title = $product->getMetaTitle();
   $descripton = $product->getMetaDescription();
@endphp
@section('title', $title)
@section('description', $descripton)
@section('styles')
    <style>
        .line {
            flex-grow: 1;
            height: 3.72px;
            background-color: #6667AB;
        }
    </style>
@endsection
@section('content')
    @include('frontend.product.parts.parallax')
    <!-- product section -->
    <div class="section" style="padding-top: 0px !important;">
        <div class="row mt-4 mx-4">
            <div class="container">
                <div class="row">
                    <div class="col-12 d-flex align-items-center">
                        <h1 class="fw-semi-bold text-very-peri me-3">
                            {{$series->getName()}}
                        </h1>
                        <div class="line"></div>
                    </div>
                    <div class="col-12">
                        <p style="margin-top: -10px;">{{$series->getDescription()}}</p>
                    </div>

                    <!-- Main content and similar products section -->
                    <div class="col-12 mt-3 row">

                        <!-- Gallery Section - Order First on Mobile to Show Above Advantages -->
                        <div class="col-12 col-lg-7 order-1 order-lg-1">
                            <div class="row gallery-wrapper spacing-3">
                                <!-- Gallery image box 1 -->
                                <div class="col-12 gallery-box">
                                    <div class="gallery-img">
                                        <a href="{{image($product->image)}}" data-gallery-title="Gallery Image 1">
                                            <img src="{{image($product->image)}}" alt="">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Product Details Section - Shows Below Gallery on Mobile -->
                        <div class="col-12 col-lg-5 px-3 order-2 order-lg-2">
                            <h3 class="text-very-peri">{{$product->getName()}}</h3>
                            <p>{{$product->getDescription()}}</p>
                            <h3 class="text-very-peri">{{__("Avantajlar")}}</h3>
                            <div>{!! $product->getAdvantage() !!}</div>
                            <div class="d-flex justify-content-center mt-3">
                                <button class="button button-lg button-rounded button-outline-dark" data-bs-toggle="modal" data-bs-target="#technicalSpecificationsModal" type="button">
                                    {{__('Teknik Özellikler')}}
                                </button>
                            </div>
                        </div>

                        @if($series->products->count() > 1)
                            <div class="col-12 mt-5 order-3 order-lg-3">
                                <div class="mb-2">
                                    <div class="col-12 d-flex align-items-center">
                                        <h3 class="fw-semi-bold text-very-peri me-3">
                                            {{__("Benzer Ürünler")}}
                                        </h3>
                                        <div class="line"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    @foreach($series->products as $product)
                                        <div class="col-12 col-lg-3 mb-3">
                                            <div class="blog-card">
                                                <div class="hoverbox-6 mb-2">
                                                    <a href="#">
                                                        <img src="{{image($product->image)}}" alt="">
                                                    </a>
                                                </div>
                                                <h5 class="fw-medium">
                                                    <a class="text-link-1" href="{{route('search.subCategoryProduct', [$category->getSlug(), $subCategory->getSlug(), $subCategorySon->getSlug(), $product->getSlug()])}}">
                                                        {{$product->getName()}}
                                                    </a>
                                                </h5>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                        @if(true)
                            <!-- Blog section -->
                            <div class="col-12 mt-5 order-4 order-lg-4">

                                    <div class="mb-2">
                                        <div class="col-12 d-flex align-items-center">
                                            <h3 class="fw-semi-bold text-very-peri me-3">
                                                {{__("Referanslar")}}
                                            </h3>
                                            <div class="line"></div>
                                        </div>
                                    </div>
                                    <div class="owl-carousel owl-nav-overlap" data-owl-nav="true" data-owl-margin="30" data-owl-xs="1" data-owl-sm="1" data-owl-md="1" data-owl-lg="3" data-owl-xl="2" data-owl-autoPlay="true">
                                        @foreach($product->references as $reference)
                                            <div class="hoverbox-4 bottom border-radius">
                                                <img src="{{image($reference->reference->image)}}" alt="">
                                                <div class="content">
                                                    <h5>{{$reference->reference->getName()}}</h5>
                                                    <p>
                                                        {{$reference->reference->getDescription()}}
                                                    </p>
                                                </div>
                                                <div class="hover-content">
                                                    <a class="button button-lg button-outline-white button-rounded" href="{{route('reference.detail', [$reference->reference->category->getSlug(), $reference->reference->getSlug()])}}">{{ __('İncele') }}</a>
                                                </div>
                                            </div>
                                        @endforeach
                                        <!-- Blog post -->


                                    </div>

                            </div>
                            <!-- end Blog section -->

                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Teknik Özellikler Modal -->
    <div class="modal fade" id="technicalSpecificationsModal" tabindex="-1" aria-labelledby="technicalSpecificationsLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="technicalSpecificationsLabel">{{ __('Teknik Özellikler') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-5">
                    {!! $product->getTechnic() !!}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Kapat') }}</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
