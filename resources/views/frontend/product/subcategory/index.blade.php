@extends('frontend.layouts.master')
@section('title', $subCategory->getMetaTitle())
@section('description', $subCategory->getMetaDescription())

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
            <div class="row mt-4 mx-lg-4 mx-2">
                <div class="col-12 col-lg-3">
                    <div class="border p-4 mb-4">
                        <h6 class="font-small fw-medium uppercase mb-4 text-center">{{__('Hızlı Menü')}}</h6>
                        <ul class="list-unstyled">
                            @foreach($subCategory->subCategories as $row)
                                <li class="pb-2 border-bottom">
                                    <a class="d-flex justify-content-between"
                                       href="{{route('search.subCategorySon', [$category->getSlug(), $subCategory->getSlug(), $row->getSlug()])}}">
                                        {{$row->getName()}}
                                        <span>{{$row->series->count()}}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-lg-9">
                    <div class="row">
                        @forelse($subCategorySon->series as $serie)
                            <div class="col-12 d-flex align-items-center">
                                <h1 class="fw-semi-bold text-very-peri me-3">
                                    {{$serie->getName()}}
                                </h1>
                                <div class="line"></div>
                            </div>
                            <div class="mt-1 row">

                                @foreach($serie->products as $product)

                                    <div class="col-12 col-lg-4 mb-3">
                                        <div class="blog-card" style="cursor: pointer;" onclick="window.location.href = '{{route('search.subCategoryProduct', [$category->getSlug(), $subCategory->getSlug(), $subCategorySon->getSlug(), $product->getSlug()])}}'">
                                            <div class="hoverbox-6 mb-2">
                                                <a href="{{route('search.subCategoryProduct', [$category->getSlug(), $subCategory->getSlug(), $subCategorySon->getSlug(), $product->getSlug()])}}">
                                                    <img src="{{image($product->image)}}" alt="" style="width: 315px;height: 415px;object-fit: cover;">
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
                        @empty
                            <div class="alert alert-warning">{{__("Bu türde ürün bulunamadı")}}</div>
                        @endforelse
                    </div>
                </div>
            </div>
    </div>
@endsection

@section('scripts')

@endsection
