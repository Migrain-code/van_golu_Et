@extends('frontend.layouts.master')
@section('title', trans('İletişim'))
@section('description', trans('İletişim'))
@section('styles')
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
@endsection
@section('content')
    @include('frontend.contact.parts.banner')
    @include('frontend.contact.parts.infobox')
    @include('frontend.contact.parts.form')

@endsection

@section('scripts')

@endsection
