@extends('frontend.layouts.master')
@section('title', setting('about_meta_title_'.app()->getLocale().'_text'))
@section('description', setting('about_meta_description'.app()->getLocale().'_text'))
@section('styles')

@endsection
@section('content')
    <!-- breadcrumb-area -->
    <section class="breadcrumb-area tg-motion-effects breadcrumb-bg" data-background="/frontend/assets/img/bg/breadcrumb_bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-content">
                        <h2 class="title">{{__('Şubelerimiz')}}</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">{{__('Anasayfa')}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{__('Şubeler')}}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->

    <!-- choose-area -->
    <section class="choose-area choose-area-two choose-bg" data-background="/frontend/assets/img/bg/choose_bg.jpg">
        <div class="container">
            <div class="row">
                @foreach($branches as $branche)
                    <div class="col-lg-4 mb-2" style="cursor: pointer" onclick="window.open('{{route('branche.detail', $branche->getSlug())}}', '_parent')">
                        <div class="card" style="border-radius: 15px">
                            <div class="card-body">
                                <img src="{{image($branche->image)}}" style="border-radius: 15px;height: 400px;
    object-fit: cover;">
                                <h3 class="title mt-3">{{$branche->getName()}}</h3>
                                <div class="d-flex justify-content-end">
                                    <a class="btn" style="font-size: 12px" href="{{route('branche.detail', $branche->getSlug())}}"><span>{{__('Şubeye Git')}}</span></a>

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

        </div>
    </section>
    <!-- choose-area-end -->

@endsection
@section('scripts')

@endsection
