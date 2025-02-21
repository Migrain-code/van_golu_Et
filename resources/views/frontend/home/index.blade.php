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
        });
        $('#kurekEti').on('click', function (){
            Swal.fire({
                title: "Kürek",
                text: "Dananın ön bacaklarının üst kısmında, kürek kemiği çevresinde bulunan ettir. Yağ oranı dengeli ve lifli yapısıyla, sulu yemekler, kavurma ve kıyma yapımında tercih edilir.",
                confirmButtonText: "Tamam, Anladım"
            });

        });
        $('#antrikot').on('click', function (){
            Swal.fire({
                title: "Antrikot",
                text: "Dananın sırt bölgesinde, omurganın iki yanında bulunan yumuşak ve yağlı ettir. Izgara, biftek ve rosto yapımında tercih edilir.",
                confirmButtonText: "Tamam, Anladım"
            });
        });
        $('#kaburga').on('click', function (){
            Swal.fire({
                title: "Kaburga",
                text: "Dananın göğüs kafesi çevresinde, kemikli ve yağlı yapıda bulunan ettir. Fırın yemekleri, haşlama ve tandır yapımında tercih edilir.",
                confirmButtonText: "Tamam, Anladım"
            });
        });
        $('#dos').on('click', function (){
            Swal.fire({
                title: "Döş",
                text: "Dananın göğüs altı ve karın bölgesinde bulunan, yağlı ve yumuşak bir ettir. Genellikle kıyma yapımında, haşlama ve tencere yemeklerinde tercih edilir.",
                confirmButtonText: "Tamam, Anladım"
            });
        });
        $('#kolEti').on('click', function (){
            Swal.fire({
                title: "Kol Eti",
                text: "Dananın ön bacak kısmında bulunan, lifli ve az yağlı bir ettir. Genellikle haşlama, tencere yemekleri ve kıyma yapımında tercih edilir.",
                confirmButtonText: "Tamam, Anladım"
            });
        });
        $('#kontrfile').on('click', function (){
            Swal.fire({
                title: "Kontrfile",
                text: "Dananın sırt kısmında, antrikotun devamında bulunan, yağsız ve sıkı dokulu bir ettir. Genellikle ızgara, rosto ve biftek yapımında tercih edilir.",
                confirmButtonText: "Tamam, Anladım"
            });
        });
        $('#bonfile').on('click', function (){
            Swal.fire({
                title: "Bonfile",
                text: "Dananın sırt kısmında, omurganın iç tarafında bulunan, yumuşak ve yağsız bir ettir. Genellikle ızgara, steak ve fileto yapımında tercih edilir.",
                confirmButtonText: "Tamam, Anladım"
            });
        });
        $('#diyafram').on('click', function (){
            Swal.fire({
                title: "Diyafram",
                text: "Dananın göğüs boşluğunu çevreleyen, yoğun aromalı ve lifli bir ettir. Genellikle ızgara, taco ve fajita yapımında tercih edilir.",
                confirmButtonText: "Tamam, Anladım"
            });
        });
        $('#diyaframEti').on('click', function (){
            Swal.fire({
                title: "Diyafram Eti (Skirt Steak)",
                text: "Dananın göğüs boşluğunu çevreleyen, yoğun aromalı ve lifli bir ettir. Genellikle ızgara, taco ve fajita yapımında tercih edilir.",
                confirmButtonText: "Tamam, Anladım"
            });
        });
        $('#kalca').on('click', function (){
            Swal.fire({
                title: "Kalça",
                text: "Dananın arka bacak kısmında bulunan, yağsız ve lezzetli bir ettir. Genellikle biftek, rosto ve sote yemeklerinde tercih edilir.",
                confirmButtonText: "Tamam, Anladım"
            });
        });
        $('#ustBut').on('click', function (){
            Swal.fire({
                title: "Üst But",
                text: "Dananın arka bacak kısmının üst kısmında bulunan, yağsız ve kaslı bir ettir. Genellikle biftek, sote ve haşlama yemeklerinde tercih edilir.",
                confirmButtonText: "Tamam, Anladım"
            });
        });
        $('#arkaBut').on('click', function (){
            Swal.fire({
                title: "Arka But",
                text: "Dananın arka bacak kısmının alt kısmında yer alan, yağsız ve kaslı bir ettir. Genellikle biftek, rosto, sote ve kebap yapımında tercih edilir.",
                confirmButtonText: "Tamam, Anladım"
            });
        });
        $('#dizKapagi').on('click', function (){
            Swal.fire({
                title: "Diz Kapağı Eti",
                text: "Dananın diz kapağının çevresinde yer alan, bağ dokusu ve jelatinli etlerden oluşan bir bölgedir. Genellikle haşlama, çorba ve et suyu yapımında tercih edilir.",
                confirmButtonText: "Tamam, Anladım"
            });
        });
        $('#kuyruk').on('click', function (){
            Swal.fire({
                title: "Kuyruk",
                text: "Dananın kuyruk kısmında bulunan, yoğun yağlı ve jelatinli bir ettir. Genellikle zengin çorba, et suyu ve uzun pişirme yemeklerinde tercih edilir.",
                confirmButtonText: "Tamam, Anladım"
            });
        });
    </script>
@endsection
