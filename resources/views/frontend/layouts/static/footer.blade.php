<footer>
    <div class="section-sm bg-dark">
        <div class="container">
            <div class="row g-4">
                <div class="col-6 col-sm-6 col-lg-3">
                    <h3 class="uppercase letter-spacing-1">{{ __('mono') }}</h3>
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
                        <li>121 King St, Melbourne VIC 3000</li>
                        <li>contact@example.com</li>
                        <li>+(123) 456 789 01</li>
                    </ul>
                </div>
            </div><!-- end row -->
        </div><!-- end container -->
    </div>
    <div class="bg-black py-4">
        <div class="container">
            <div class="row align-items-center g-2 g-lg-3">
                <div class="col-12 col-md-6 text-center text-md-start">
                    <p>&copy; 2024 FlaTheme, All Rights Reserved.</p>
                </div>
                <div class="col-12 col-md-6 text-center text-md-end">
                    <ul class="list-inline-sm">
                        <li><a class="button-circle button-circle-sm button-circle-social-facebook" href="#"><i class="bi bi-facebook"></i></a></li>
                        <li><a class="button-circle button-circle-sm button-circle-social-twitter" href="#"><i class="bi bi-twitter-x"></i></a></li>
                        <li><a class="button-circle button-circle-sm button-circle-social-pinterest" href="#"><i class="bi bi-pinterest"></i></a></li>
                        <li><a class="button-circle button-circle-sm button-circle-social-instagram" href="#"><i class="bi bi-instagram"></i></a></li>
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
