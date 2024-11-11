@extends('frontend.layouts.master')
@section('title', setting('about_meta_title_'.app()->getLocale().'_text'))
@section('description', setting('about_meta_description'.app()->getLocale().'_text'))
@section('content')
    <!-- end Header -->
    <div class="section-xl bg-image parallax" data-bg-src="{{image(setting('about_banner_image'))}}">
        <div class="bg-dark-06">
            <div class="container text-center">
                <h1 class="fw-normal m-0">{{__('Hakkımızda')}}</h1>
                <ul class="list-inline-dash">
                    <li><a href="/">{{__("Anasayfa")}}</a></li>
                    <li><a href="{{route('about.index')}}">{{__("Hakkımızda")}}</a></li>
                </ul>
            </div><!-- end container -->
        </div>
    </div>
    <div class="section" style="padding: 50px 0px;">
        <div class="container">
            <div class="row g-4">
                {!! setting('about_content_'.app()->getLocale().'_text') !!}
            </div><!-- end row -->

        </div><!-- end container -->
    </div>
    <!-- Misyon Vizyon  -->
    <div class="section pt-0">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-12 col-lg-7">
                    <div class="owl-carousel owl-dots-overlay" data-owl-items="1" data-owl-autoplay="true">
                        <!-- Carousel item 1 -->
                        @foreach($galleries as $gallery)
                            <div>
                                <img src="{{image($gallery->image)}}" alt="">
                            </div>
                        @endforeach

                    </div>
                </div>
                <div class="col-12 col-lg-5">
                    <div class="row g-4">
                        <div class="col-12 col-md-6 col-lg-12">
                            <h4 class="fw-bold">Misyonumuz</h4>
                            <p>{{setting('about_mission_'.app()->getLocale().'_text')}}</p>
                        </div>
                        <div class="col-12 col-md-6 col-lg-12">
                            <h4 class="fw-bold">Vizyonumuz</h4>

                            <p>{{setting('about_vission_'.app()->getLocale().'_text')}}</p>
                        </div>
                    </div>
                </div>

            </div><!-- end row -->
        </div><!-- end container -->
    </div>

    <!-- product section -->
    <div class="section" style="padding-top: 0px !important;">
        <div class="container">
            <div class="d-flex justify-content-center align-items-center mb-4">
                <div class="row">
                    <div class="col-12 text-center">
                        <h6 class="d-inline-block bg-gray border-radius
								 px-3 py-2 line-height-140 font-small uppercase letter-spacing-1 mb-3">
									<span class="text-color-theme">
										{{__('Referanslar')}}
									</span>
                        </h6>
                        <h2 class="fw-bold mb-1">
                            {{__("Referanslarımız")}}
                        </h2>
                        <p class="">
                            {{__("Referanslarımız Alt Başlığı")}}
                        </p>
                    </div>

                </div>

            </div>
            <div class="mb-0">
                <div class="row g-3 g-lg-4">
                    @foreach($references as $reference)
                        <div class="col-12 col-lg-3">
                            <div class="hoverbox-4 bottom border-radius">
                                <img src="{{image($reference->image)}}" style="min-height: 315px;object-fit: cover" alt="">
                                <div class="content">
                                    <h5>{{$reference->getName()}}</h5>
                                </div>
                                <div class="hover-content">
                                    <a class="button button-md button-radius button-outline-white" href="{{route('reference.detail', [$reference->category->getSlug(), $reference->getSlug()])}}">Detay</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div><!-- end row -->
            </div>
        </div>
    </div>
    <!-- end product section -->
    <!-- product section -->
    <div class="section" style="padding-top: 0px !important;">
        <div class="container">
            <div class="d-flex justify-content-center align-items-center mb-4">
                <div class="row">
                    <div class="col-12 text-center">
                        <h2 class="fw-bold mb-1">
                            {{__("İndirilebilir İçerik")}}
                        </h2>
                    </div>

                </div>

            </div>
            <div class="mb-0">
                <div class="owl-carousel" data-owl-dots="false" data-owl-nav="true" data-owl-margin="50" data-owl-autoplay="true" data-owl-xs="1" data-owl-sm="2" data-owl-md="3" data-owl-lg="4" data-owl-xl="5">
                    @foreach($downloadableContents as $downCont)
                        <div class="client-box">
                            <a href="{{image($downCont->getFile())}}" target="_blank">
                                <img src="{{image($downCont->getImage())}}" alt="">
                                <span class="fw-semibold p-3 d-block">{{$downCont->getName()}}</span>
                            </a>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
    <!-- end product section -->
@endsection
