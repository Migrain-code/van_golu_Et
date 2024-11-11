@extends('frontend.layouts.master')
@section('title', trans('Videolar'))
@section('description', trans('Videolar'))
@section('content')

    <div class="section-xl bg-image parallax section-divider-curve-bottom" data-bg-src="{{image(setting('speed_contact_image'))}}">
        <div class="bg-dark-06">
            <div class="container text-center">
                <h1 class="fw-normal m-0">{{__('Videolar')}}</h1>
                <ul class="list-inline-dash">
                    <li><a href="/">{{__('Anasayfa')}}</a></li>
                    <li><a href="{{route('video')}}">{{__('Videolar')}}</a></li>

                </ul>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="container">
            <!-- Team section -->
            <div class="mt-2">
                <div class="container">
                    <div class="row g-4 gy-5 team-wrapper border-radius">
                        @foreach($videos as $video)
                            <!-- Vide kutusu 1 -->
                            <div class="col-12 col-sm-6 col-lg-3">
                                <div class="img-box-icon border-radius-1 box-shadow">
                                    <a class="lightbox-media-box border-radius icon-xl" href="{{$video->getEmbedCode()}}">
                                        <img src="{{image($video->image)}}"  alt="">
                                        <i class="bi bi-play"></i>
                                    </a>
                                </div>
                            </div>
                        @endforeach


                    </div><!-- end row -->

                </div><!-- end container -->
            </div>
            <!-- end Team section -->

        </div><!-- end container -->
    </div>

@endsection
