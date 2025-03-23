@extends('frontend.layouts.master')
@section('title', setting('about_meta_title_'.app()->getLocale().'_text'))
@section('description', setting('about_meta_description'.app()->getLocale().'_text'))
@section('styles')
    <style>
        p {
            font-size: var(--tg-body-font-size);
            font-weight: var(--tg-body-font-weight);
            line-height: var(--tg-body-line-height);
            color: #212121;
            margin-bottom: 15px;
        }
    </style>
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css"
    />
@endsection
@section('content')
    <!-- breadcrumb-area -->
    <section class="breadcrumb-area tg-motion-effects breadcrumb-bg" data-background="/frontend/assets/img/bg/breadcrumb_bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-content">
                        <h2 class="title">{{__('Biz Kimiz')}}</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">{{__('Anasayfa')}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{__('Hakkımızda')}}</li>
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
                <div class="col-lg-12">
                    <div class="section-title text-center mb-50">
                        <span class="sub-title">{{__('Van Gölü Et')}}</span>
                        <h2 class="title">{{__('Neden Mağazamızı Seçmelisiniz')}}</h2>
                        <div class="title-shape" data-background="/frontend/assets/img/images/title_shape.png"></div>
                    </div>
                    <div>
                        <p>{!! setting('about_content_'.app()->getLocale().'_text') !!}</p>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- choose-area-end -->
    
    <!-- faq-area -->
    <section class="faq-area tg-motion-effects faq-bg" data-background="/frontend/assets/img/bg/faq_bg.jpg">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-6 col-md-10">

                        <img src="{{image(setting('about_banner_image'))}}" style="width: 100%;" alt="">


                </div>
                <div class="col-lg-6">
                    <div class="faq-content">
                        <div class="faq-wrap">
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            {{__('Misyonumuz')}}
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <p>{{setting('about_mission_'.app()->getLocale().'_text')}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            {{__('Vizyonumuz')}}
                                        </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <p>{{setting('about_vission_'.app()->getLocale().'_text')}}</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="faq-shape-wrap">
            <img src="/frontend/assets/img/images/faq_shape01.png" alt="" class="tg-motion-effects3">
            <img src="/frontend/assets/img/images/faq_shape02.png" alt="" class="tg-motion-effects2">
        </div>
    </section>
    <!-- faq-area-end -->

@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
    <script>
        Fancybox.bind('[data-fancybox="gallery"]', {
            // Your custom options for a specific gallery
        });
    </script>

@endsection
