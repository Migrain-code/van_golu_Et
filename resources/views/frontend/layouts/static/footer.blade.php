<footer>
    <div class="section-sm bg-dark">
        <div class="container">
            <div class="row g-4">
                <div class="col-6 col-sm-6 col-lg-3">
                    <div class="d-flex justify-content-center align-items-center p-5">
                        <img src="{{image(setting('logo'))}}" style="">
                    </div>
                </div>
                <div class="col-6 col-sm-6 col-lg-3">
                    <h6 class="font-small fw-medium uppercase">{{ __('Useful Links') }}</h6>
                    <ul class="list-dash animate-links">
                        <li><a href="#">{{ __('About us') }}</a></li>
                        <li><a href="#">{{ __('Team') }}</a></li>
                        <li><a href="#">{{ __('Prices') }}</a></li>
                        <li><a href="#">{{ __('Contact') }}</a></li>
                    </ul>
                </div>
                <div class="col-6 col-sm-6 col-lg-3">
                    <h6 class="font-small fw-medium uppercase">{{ __('Additional Links') }}</h6>
                    <ul class="list-dash animate-links">
                        <li><a href="#">{{ __('Services') }}</a></li>
                        <li><a href="#">{{ __('Process') }}</a></li>
                        <li><a href="#">{{ __('FAQ') }}</a></li>
                        <li><a href="#">{{ __('Careers') }}</a></li>
                    </ul>
                </div>
                <div class="col-6 col-sm-6 col-lg-3">
                    <h6 class="font-small fw-medium uppercase">{{ __('Contact Info') }}</h6>
                    <ul class="list-unstyled">
                        <li>{{setting('speed_address')}}</li>
                        <li>{{setting('speed_phone')}}</li>
                        <li>{{setting('speed_email')}}</li>
                    </ul>
                </div>
            </div><!-- end row -->
        </div><!-- end container -->
    </div>
    <div class="bg-black py-4">
        <div class="container">
            <div class="row align-items-center g-2 g-lg-3">
                <div class="col-12 col-md-6 text-center text-md-start">
                    <p>&copy; {{now()->year}} {{setting('speed_site_title')}}, {{__('Tüm hakları saklıdır.')}}</p>
                </div>
                <div class="col-12 col-md-6 text-center text-md-end">
                    <ul class="list-inline-sm">
                        <li><a class="button-circle button-circle-sm button-circle-social-facebook" href="{{setting('speed_facebook_url')}}"><i class="bi bi-facebook"></i></a></li>
                        <li><a class="button-circle button-circle-sm button-circle-social-twitter" href="{{setting('speed_twitter_url')}}"><i class="bi bi-twitter-x"></i></a></li>
                        <li><a class="button-circle button-circle-sm button-circle-social-instagram" href="{{setting('speed_instagram_url')}}"><i class="bi bi-instagram"></i></a></li>
                    </ul>
                </div>
            </div><!-- end row -->
        </div><!-- end container -->
    </div>
</footer>
<!-- Scroll to top button -->
<div class="scrolltotop icon-lg">
    <a class="button-circle button-circle-md button-circle-dark" href="#">
        <i class="bi bi-arrow-up-short"></i>
    </a>
</div>
<!-- end Scroll to top button -->
@include('frontend.layouts.components.scripts')
</body>
</html>
