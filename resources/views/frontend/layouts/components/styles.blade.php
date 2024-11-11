<link href="{{image(setting('favicon'))}}" rel="shortcut icon">
<!-- CSS -->
<link href="/frontend/assets/plugins/bootstrap/bootstrap.min.css" rel="stylesheet">
<link href="/frontend/assets/plugins/owl-carousel/owl.carousel.min.css" rel="stylesheet">
<link href="/frontend/assets/plugins/owl-carousel/owl.theme.default.min.css" rel="stylesheet">
<link href="/frontend/assets/plugins/magnific-popup/magnific-popup.min.css" rel="stylesheet">
<link href="/frontend/assets/plugins/scrollcue/scrollcue.css" rel="stylesheet">
<link href="/frontend/assets/plugins/swiper/swiper-bundle.min.css" rel="stylesheet">
<link href="/frontend/assets/css/theme.min.css" rel="stylesheet">
<!-- Fonts/Icons -->
<link href="/frontend/assets/plugins/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
<link href="/frontend/assets/plugins/font-awesome/css/all.css" rel="stylesheet">
<style>
    ::-webkit-scrollbar{
        width: 5px;
        height: 5px;
    }

    ::-webkit-scrollbar-thumb{
        background: #6667ab;
    }
    ::-webkit-scrollbar-track{
        background: #0b0e18;
    }
    .languageMenu{
        display: none !important;
    }
    @media (max-width: 768px) {
        .hoverbox-4.bottom .content p,
        .hoverbox-4.bottom .hover-content p {
            display: none;
        }

        .hoverbox-4.bottom .content h5,
        .hoverbox-4.bottom .hover-content h5 {
            font-size: 17px;
        }
        .languageMenu{
            display: inline-block !important;
        }


    }


</style>
@yield('styles')
