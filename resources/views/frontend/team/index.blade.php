@extends('frontend.layouts.master')
@section('title', trans('Yönetim Kurulu'))
@section('description', trans('Yönetim Kurulu'))
@section('content')

    <div class="section-xl bg-image parallax section-divider-curve-bottom" data-bg-src="{{image(setting('speed_contact_image'))}}">
        <div class="bg-dark-06">
            <div class="container text-center">
                <h1 class="fw-normal m-0">{{__('Yönetim Kurulu')}}</h1>
                <ul class="list-inline-dash">
                    <li><a href="/">{{__('Anasayfa')}}</a></li>
                    <li><a href="{{route('team')}}">{{__('Yönetim Kurulu')}}</a></li>

                </ul>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="container">
            <div class="d-flex justify-content-center align-items-center mb-4">
                <div class="row">
                    <div class="col-12 text-center mt-4">
                        <h2 class="fw-bold mb-1">
                            {{__("Yönetim Kurulu Başlığı")}}
                        </h2>
                        <p class="">
                            {{__("Yönetim Kurulu Alt Başlığı")}}
                        </p>
                    </div>

                </div>

            </div>
            <!-- Team section -->
            <div class="section border-top">
                <div class="container">

                    <div class="row g-4 gy-5 team-wrapper border-radius">
                        @foreach($teams as $team)
                            <!-- Takım kutusu 1 -->
                            <div class="col-12 col-sm-6 col-lg-3 team-box">
                                <div class="team-img">
                                    <img src="{{image($team->image)}}" alt="">
                                </div>
                                <h6 class="font-small fw-medium uppercase m-0">{{$team->name}}</h6>
                                <p>{{$team->getMission()}}</p>
                            </div>

                        @endforeach

                    </div><!-- end row -->

                </div><!-- end container -->
            </div>
            <!-- end Team section -->

        </div><!-- end container -->
    </div>

@endsection
