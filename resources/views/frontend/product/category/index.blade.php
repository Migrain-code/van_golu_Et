@extends('frontend.layouts.master')
@section('title', $category->getMetaTitle())
@section('description', $category->getMetaDescription())
@section('styles')

@endsection
@section('content')
    @include('frontend.product.parts.parallax')
    <!-- product section -->
    <div class="section" style="padding-top: 0px !important;">
        <div class="container">
            <div class="mt-4">
                <div class="row g-3 g-lg-4">
                    @foreach($category->subCategories as $subCategory)
                        <div class="col-12 col-lg-3">
                            <div class="hoverbox-4 bottom border-radius">
                                <img src="{{image($subCategory->image)}}" style="min-height: 315px;object-fit: cover" alt="">

                                <div class="content">
                                    <h5>{{$subCategory->getName()}}</h5>
                                </div>
                                <div class="hover-content">
                                    <a class="button button-md button-radius button-outline-white"
                                       href="{{route('search.subCategory', [$category->getSlug(), $subCategory->getSlug()])}}">
                                        {{ __('Göster') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach


                </div><!-- end row -->
            </div>
        </div>
    </div>
    <!-- end product section -->
@endsection

@section('scripts')

@endsection
