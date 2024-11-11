@extends('frontend.layouts.master')
@section('title', trans('Kişisel Verilerin Korunması Metni'))
@section('styles')

@endsection
@section('content')
    <div class="section-xl bg-image parallax section-divider-curve-bottom" data-bg-src="{{image(setting('speed_contact_image'))}}">
        <div class="bg-dark-06">
            <div class="container text-center">
                <h1 class="fw-normal m-0">{{__('Kişisel Verilerin Korunması Metni')}}</h1>
                <ul class="list-inline-dash">
                    <li><a href="/">{{__('Anasayfa')}}</a></li>
                    <li><a href="{{route('kvkk.index')}}">{{__('Kişisel Verilerin Korunması Metni')}}</a></li>

                </ul>
            </div>
        </div>
    </div>
    <div class="section">
        <div class="container">
                {!! setting('kvkk_content_'.app()->getLocale().'_text') !!}
        </div>
    </div>
@endsection

@section('scripts')

@endsection
