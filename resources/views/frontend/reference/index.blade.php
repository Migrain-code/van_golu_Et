@extends('frontend.layouts.master')
@section('title', trans("Referanslar"))
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
            <div class="row mt-4 mx-4">
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
