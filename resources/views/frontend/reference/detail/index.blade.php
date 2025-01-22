@extends('frontend.layouts.master')
@php
    $title = trans("Referanslar");
    $refName = trans("Referanslar");
    $description = trans("Referanslar");
    $image = "/frontend/assets/images/sample/slider/1.jpg";
    if (isset($category)){
        $title = $reference->getMetaTitle();
        $descripton = $reference->getMetaDescription();
        $refName = $reference->getName();
        $image = $category->image;
    } else{
         $image = $categories->first()->image;
    }

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
    @include('frontend.reference.parts.parallax')
    <!-- product section -->
    <div class="section" style="padding-top: 0px !important;">
        <div class="row mt-4 mx-lg-4 mx-2">

                @include('frontend.reference.parts.categories')
                <div class="row col-12 col-lg-9">
                    <div class="col-12 d-flex align-items-center">
                        <h1 class="fw-semi-bold text-very-peri me-3">
                            {{$reference->getName()}}
                        </h1>
                        <div class="line"></div>
                    </div>
                    <div class="col-12">
                        <p style="margin-top: -10px;">{{$reference->getDescription()}}</p>
                    </div>

                    <!-- Main content and similar products section -->
                    <div class="col-12 mt-3 row">

                        <!-- Gallery Section - Order First on Mobile to Show Above Advantages -->
                        <div class="col-12 col-lg-8 order-1 order-lg-1">
                            <div class="row gallery-wrapper spacing-3">
                                <!-- Gallery image box 1 -->
                                <div class="col-12 gallery-box">
                                    <div class="gallery-img">
                                        <a href="{{image($reference->image)}}" data-gallery-title="{{$reference->getName()}}">
                                            <img src="{{image($reference->image)}}" alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="d-flex gap-3 p-3" style="width: 1750px;overflow-x: auto;white-space: nowrap;">
                                    @foreach($reference->images as $refImage)
                                        <div class="col-4 gallery-box mt-3">
                                            <div class="gallery-img">
                                                <a href="{{image($refImage->image)}}" data-gallery-title="{{$loop->index + 1}}">
                                                    <img src="{{image($refImage->image)}}" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                            </div>
                        </div>

                        <!-- Product Details Section - Shows Below Gallery on Mobile -->
                        <div class="col-12 col-lg-4 px-3 order-2 order-lg-2">
                            <h3 class="text-very-peri">{{$reference->getName()}}</h3>
                            <p>{{$reference->getDescription()}}</p>
                            <p>{!! $reference->getContent() !!}</p>
                            <div class="row mt-3">
                            @if(isset($reference->products))
                                @foreach($reference->products as $refProduct)
                                    @if($refProduct->category)
                                            @php
                                                $product= $refProduct->product;
                                                $productLink = route('search.subCategoryProduct', [$product->category->parent->parent->parent->getSlug(),$product->category->parent->parent->getSlug(),$product->category->parent->getSlug(), $product->getSlug()]);
                                            @endphp
                                            <div class="col-12 col-lg-6">
                                                <a href="{{$productLink}}">
                                                    <img src="{{image($refProduct->product->image)}}" style="width: 200px" alt="">
                                                </a>
                                                <div class="">
                                                    <h6 class="fw-normal mt-2 mb-0">
                                                        <a class="text-link-1" href="{{$productLink}}">
                                                            {{$refProduct->product->getName()}}
                                                        </a>
                                                    </h6>
                                                </div>
                                            </div>
                                    @endif

                                @endforeach
                            @endif

                            </div>
                        </div>

                    </div>
                </div>

        </div>
    </div>
@endsection

@section('scripts')
@endsection
