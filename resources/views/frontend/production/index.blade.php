@extends('frontend.layouts.master')
@php
    $title = trans("Üretim Aşamaları");
    $description = trans("Üretim Aşamaları");
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
        .line {
            flex-grow: 1;
            height: 3.72px;
            background-color: #6667AB;
        }
    </style>
@endsection
@section('content')
    @include('frontend.production.parts.parallax')

    <!-- product section -->
    <div class="section" style="padding-top: 0px !important;">
            <div class="row mt-4 mx-lg-4 mx-2">
                @include('frontend.production.parts.categories')
                <div class="col-12 col-lg-9">
                    <div class="row">
                        <div class="col-12 d-flex align-items-center">
                            <h3 class="fw-semi-bold text-very-peri me-3">
                                {{__("Üretim Aşamaları")}}
                                @if(isset($category))
                                   / {{$category->getName()}}
                                @endif
                            </h3>
                            <div class="line"></div>
                        </div>
                        <div class="col-12 col-lg-8 order-1 order-lg-1">
                            <div class="gallery-wrapper spacing-3">
                                <div class="row">
                                    @foreach($productions as $production)
                                        <div class="col-12 col-lg-4 gallery-box mt-3">
                                            <div class="gallery-img">
                                                <a href="{{image($production->image)}}" data-gallery-title="{{$production->getName()}}">
                                                    <img src="{{image($production->image)}}" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-center">
                        {{$productions->links()}}
                    </div>
                </div>
            </div>
    </div>
@endsection

@section('scripts')

@endsection
