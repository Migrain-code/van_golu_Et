<!DOCTYPE html>
<html lang="tr" translate="no">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{setting('speed_site_title')." | "}}@yield('title', trans('Anasayfa'))</title>
    <meta name="description" content="@yield('description', trans(setting('speed_meta_descriptions')))">
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-BTHP0CGY2C"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-BTHP0CGY2C');
    </script>
    <!-- Favicon -->
    @include('frontend.layouts.components.styles')

</head>
<body>
<!-- preloader -->
<div id="preloader">
    <div id="loading-center">
        <div class="loader">
            <div class="loader-outter"></div>
            <div class="loader-inner"></div>
        </div>
    </div>
</div>
<!-- preloader-end -->

<!-- Scroll-top -->
<button class="scroll-top scroll-to-target" data-target="html">
    <i class="fas fa-angle-up"></i>
</button>
<!-- Scroll-top-end-->
@include('frontend.layouts.menu.top')
<!-- main-area -->
<main class="fix">
