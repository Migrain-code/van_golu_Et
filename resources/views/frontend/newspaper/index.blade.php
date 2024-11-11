@extends('frontend.layouts.master')
@section('title', trans('Basında Biz'))
@section('description', trans('Basında Biz'))
@section('styles')

@endsection
@section('content')
    <div class="section-xl bg-image parallax" data-bg-src="{{image(setting('about_banner_image'))}}">
        <div class="bg-dark-06">
            <div class="container text-center">
                <div class="row g-4">
                    <div class="col-12 col-md-10 offset-md-1 col-lg-8 offset-lg-2">
                        <h1 class="display-4 m-0">{{__('Basında Biz')}}</h1>
                        <ul class="list-inline-dash">
                            <li><a href="/">{{__('Anasayfa')}}</a></li>
                            <li><a href="{{route('newspaper')}}">{{__('Basında Biz')}}</a></li>

                        </ul>
                    </div>
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end bg-dark-* -->
    </div>

    <!-- product section -->
    <div class="section" style="padding-top: 0px !important;">
        <div class="container">
            <div class="d-flex justify-content-center align-items-center mb-4">
                <div class="row">
                    <div class="col-12 text-center my-5">

                        <h2 class="fw-bold mb-1">
                            {{__('Basında Biz Ana Başlık')}}
                        </h2>
                        <p class="">
                            {{__('Basında Biz Alt Başlık')}}
                        </p>
                    </div>

                </div>

            </div>
            <div class="mb-0">
                <div class="row g-3 g-lg-4">
                   @foreach($newspapers as $news)
                        <div class="col-12 col-lg-4">
                            <div class="hoverbox-4 bottom border-radius">
                                <img src="{{image($news->image)}}" style="min-height: 315px;object-fit: cover" alt="">
                                <div class="content">
                                    <h5>{{$news->getTitle()}}</h5>
                                </div>
                                <div class="hover-content">
                                    <a class="button button-md button-radius button-outline-white" href="{{$news->getLink()}}" target="_blank">{{__('Detay')}}</a>
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
