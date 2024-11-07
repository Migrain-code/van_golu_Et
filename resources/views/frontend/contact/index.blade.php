@extends('frontend.layouts.master')
@section('title', trans('İletişim'))
@section('styles')
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
@endsection
@section('content')
    @include('frontend.contact.parts.banner')
    @include('frontend.contact.parts.infobox')
    @include('frontend.contact.parts.form')
    <!-- Google Maps -->
    <div class="container-fluid p-0">
        {!! setting('speed_address_map') !!}
    </div><!-- end container-fluid -->
    <!-- end Google Maps -->
@endsection

@section('scripts')

@endsection
