@extends('frontend.layouts.master')
@section('styles')
    <style>
        .area{
            transition: 0.4s;
        }
        .area:hover{
            fill: #FF1001FF !important;

        }
        .area:hover + .areaText {
            fill: black !important;
        }
        .areaText:hover + .area {
            fill: #FF1001FF !important;
        }
    </style>

@endsection
@section('content')
        @include('frontend.home.parts.slider')
        @include('frontend.home.parts.aboutsec')
        @include('frontend.home.parts.butcher')
        @include('frontend.home.parts.product')
        @include('frontend.home.parts.reference')
        @include('frontend.home.parts.video')
        @include('frontend.home.parts.blog')
@endsection
@section('scripts')
    <script>
        $('#gerdan').on('click', function (){
            Swal.fire({
                title: "Gerdan",
                text: "Dananın boyun bölgesine yakın, etli ve yağlı kısmıdır. " +
                    "Türk mutfağında genellikle lezzetli ve yağlı etler arayanlar için tercih edilir.",
                confirmButtonText: "Tamam, Anladım"
            });
        })
    </script>
@endsection
