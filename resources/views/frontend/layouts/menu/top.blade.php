<!-- header-area -->
<header class="transparent-header">
    <div class="header-top-wrap header-top-wrap-three">
        <div class="container custom-container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-8">
                    <div class="header-top-left">
                        <ul class="list-wrap">
                            <li class="header-location">
                                <i class="fas fa-map-marker-alt"></i>
                                {{setting('speed_address')}}
                            </li>
                            <li>
                                <i class="fas fa-envelope"></i>
                                <a href="mailto:{{setting('speed_email')}}">{{setting('speed_email')}}</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-4">
                    <div class="header-top-right">
                        <div class="header-top-menu">
                            <ul class="list-wrap">
                                <li><a href="{{route('contact.index')}}">{{__('İletişim')}}</a></li>
                            </ul>
                        </div>
                        <div class="header-top-social">
                            <ul class="list-wrap">
                                @if(setting('speed_facebook_url'))
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                @endif
                                @if(setting('speed_twitter_url'))
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                @endif
                                @if(setting('speed_intagram_url'))
                                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="sticky-header" class="menu-area menu-area-three">
        <div class="container custom-container">
            <div class="row">
                <div class="col-12">
                    <div class="menu-wrap">
                        <div class="mobile-nav-toggler"><i class="fas fa-bars"></i></div>
                        <nav class="menu-nav">
                            <div class="logo">
                                <a href="/"><img src="{{image(setting('logo'))}}" alt="Logo"></a>
                            </div>
                            <div class="navbar-wrap main-menu d-none d-lg-flex">
                                <ul class="navigation">
                                    <li><a href="/">{{__('Anasayfa')}}</a></li>
                                    <li><a href="{{route('about.index')}}">{{__('Hakkımızda')}}</a></li>
                                    <li><a href="{{route('product.index')}}">{{__('Ürünler')}}</a></li>
                                    <li><a href="{{route('blog.index')}}">{{__('Bloglar')}}</a></li>
                                    <li><a href="#">{{__('İletişim')}}</a></li>
                                    <li><a href="#">{{__('Şubeler')}}</a></li>
                                </ul>
                            </div>
                            <div class="header-action d-none d-md-block">
                                <ul class="list-wrap">
                                    <li class="header-search">
                                        <a href="#"><i class="flaticon-search"></i></a>
                                    </li>

                                    <li class="header-btn"><a href="tel:{{setting('speed_phone')}}" class="btn">{{setting('speed_phone')}}</a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>

                    <!-- Mobile Menu  -->
                    <div class="mobile-menu">
                        <nav class="menu-box">
                            <div class="close-btn"><i class="fas fa-times"></i></div>
                            <div class="nav-logo">
                                <a href="/"><img src="{{image(setting('logo'))}}" alt="Logo"></a>
                            </div>
                            <div class="menu-outer">
                                <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
                            </div>
                            <div class="social-links">
                                <ul class="clearfix list-wrap">
                                    <li><a href="{{setting('speed_facebook_url')}}"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="{{setting('speed_twitter_url')}}"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="{{setting('speed_instagram_url')}}"><i class="fab fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                    <div class="menu-backdrop"></div>
                    <!-- End Mobile Menu -->

                </div>
            </div>
        </div>
    </div>

    <!-- header-search -->
    <div class="search-popup-wrap" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="search-wrap text-center">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="search-form">
                            <form action="#">
                                <input type="text" placeholder="Anahtar kelimenizi girin...">
                                <button class="search-btn"><i class="flaticon-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="search-backdrop"></div>
    <!-- header-search-end -->

</header>
<!-- header-area-end -->
