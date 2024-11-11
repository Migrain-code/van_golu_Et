@extends('frontend.layouts.master')
@php
    $title = trans("Referanslar");
    $refName = trans("Referanslar");
    $description = trans("Referanslar");
    $image = "/frontend/assets/images/sample/slider/1.jpg";
    if (isset($category)){
        $title = $category->getMetaTitle();
        $refName = $category->getName();
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
    @include('frontend.reference.parts.parallax')

    <!-- product section -->
    <div class="section" style="padding-top: 0px !important;">
            <div class="row mt-4 mx-lg-4 mx-2">
                @include('frontend.reference.parts.categories')
                <div class="col-12 col-lg-9">
                    <div class="row">
                        <div class="col-12 mt-1 row">
                            @foreach($references as $rowReference)
                                <div class="col-12 col-lg-4 mb-3">
                                    <div class="hoverbox-4 bottom border-radius">
                                        <img src="{{image($rowReference->image)}}" style="min-height: 315px;object-fit: cover" alt="">
                                        <div class="content">
                                            <h5 style="margin-bottom: -5px;">{{ $rowReference->getName() }}</h5>
                                            <p>{{$rowReference->getDescription()}}</p>
                                        </div>
                                        <div class="hover-content">

                                            <a class="button button-md button-radius button-outline-white" href="{{route('reference.detail', [$rowReference->category->getSlug(),$rowReference->getSlug()])}}">{{ __('Detay') }}</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-center">
                        {{$references->links()}}
                    </div>
                </div>
            </div>
    </div>
@endsection

@section('scripts')

@endsection
