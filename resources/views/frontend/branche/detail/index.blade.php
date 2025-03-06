@extends('frontend.layouts.master')
@section('title', $branche->getName())
@section('description', $branche->getName())
@section('styles')
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
@endsection
@section('content')
    <!-- breadcrumb-area -->
    <section class="breadcrumb-area tg-motion-effects breadcrumb-bg" data-background="/frontend/assets/img/bg/breadcrumb_bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-content">
                        <h2 class="title">{{$branche->getName()}}</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">{{__('Anasayfa')}}</a></li>
                                <li class="breadcrumb-item"><a href="{{route('branche.index')}}">{{__('Şubeler')}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{$branche->getName()}}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->

    <!-- contact-area -->
    <section class="contact-area">
        <div class="contact-info-wrap contact-info-bg" data-background="/frontend/assets/img/bg/contact_info_bg.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="contact-info-item">
                            <div class="icon">
                                <i class="flaticon-call"></i>
                            </div>
                            <div class="content">
                                <h4 class="title">{{__('Telefon')}}</h4>
                                <a href="tel:{{$branche->phone}}" style="color: white">{{$branche->phone}}</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="contact-info-item">
                            <div class="icon">
                                <i class="flaticon-email"></i>
                            </div>
                            <div class="content">
                                <h4 class="title">{{__('E-posta')}}</h4>
                                <span>{{$branche->email}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="contact-info-item">
                            <div class="icon">
                                <i class="flaticon-location"></i>
                            </div>
                            <div class="content">
                                <h4 class="title">{{__('Adres')}}</h4>
                                <span>{{$branche->address}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="contact-info-item">
                            <div class="icon">
                                <i class="flaticon-location-1"></i>
                            </div>
                            <div class="content">
                                <h4 class="title">{{__('Site')}}</h4>
                                <span>{{__('vangoluet.com')}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="contact-wrap">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="contact-content">
                            <div class="section-title mb-15">
                                <span class="sub-title">{{__('Sorunu mu Var?')}}</span>
                                <h2 class="title">{{__('Bize Yazın')}}</h2>
                            </div>
                            <p>
                                {{__('Bir sorunuz mu var bize ulaşın sizi arayalım veya mail ile bilgilendirelim')}}
                            </p>
                            <form action="{{route('contact.sendForm')}}" method="POST">
                                @csrf
                                <div class="contact-form-wrap">
                                    <div class="form-grp">
                                        <input name="name" type="text" placeholder="{{__('Ad Soyad')}} *" required>
                                    </div>
                                    <div class="form-grp">
                                        <input name="email" type="email" placeholder="{{__('E-posta')}} *" required>
                                    </div>
                                    <div class="form-grp">
                                        <input name="subject" type="text" placeholder="{{__('Konu')}} *" required>
                                    </div>
                                    <div class="form-grp">
                                        <textarea name="message" placeholder="{{__('Mesajınız')}}"></textarea>
                                    </div>
                                    <button type="submit">{{__('Gönder')}}</button>
                                </div>
                            </form>
                            <p class="ajax-response mb-0"></p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="contact-map">
                            {!! $branche->embed !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact-area-end -->
@endsection

@section('scripts')

@endsection
