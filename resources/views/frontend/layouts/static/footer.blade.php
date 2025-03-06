</main>

<footer>
    <div class="footer-area footer-area-two">
        <div class="footer-top">
            <div class="container custom-container">
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                        <div class="footer-widget">
                            <div class="fw-logo">
                                <a href="/"><img src="{{image(setting('speed_footer_logo'))}}" alt=""></a>
                            </div>
                            <div class="footer-contact">
                                <ul class="list-wrap">
                                    <li>{{setting('speed_about_text')}}</li>
                                </ul>
                            </div>

                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-4 col-md-6 col-sm-6">
                        <div class="footer-widget">
                            <h4 class="fw-title">{{__("Menüler")}}</h4>
                            <div class="footer-link">
                                <ul class="list-wrap">
                                    <li><a href="/">{{__('Anasayfa')}}</a></li>
                                    <li><a href="{{route('about.index')}}">{{__('Hakkımızda')}}</a></li>
                                    <li><a href="{{route('product.index')}}">{{__('Ürünler')}}</a></li>
                                    <li><a href="{{route('blog.index')}}">{{__('Bloglar')}}</a></li>
                                    <li><a href="{{route('branche.index')}}">{{__('Şubeler')}}</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="footer-widget">
                            <h4 class="fw-title">{{__("Kategoriler")}}</h4>
                            <div class="footer-link">
                                <ul class="list-wrap">
                                    @foreach($categories as $category)
                                        <li><a href="{{route('product.category', $category->getSlug())}}">{{$category->getName()}}</a></li>
                                    @endforeach


                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="footer-widget">
                            <h4 class="fw-title">{{__("Abone Ol")}}</h4>
                            <div class="footer-newsletter-two">
                                <p>{{__("İndirimlerden ve haberlerden önce bilgileneceksiniz")}}</p>
                                <form action="{{route('subscribe')}}" method="post">
                                    @csrf
                                    <input type="email" name="email" placeholder="info@yourmail.com">
                                    <button class="btn" type="submit">{{__("Abone Ol")}}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container custom-container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-7">
                        <div class="copyright-text">
                            <p>© 2023 By <a href="index.html">Bemet</a>, All Rights Reserved</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-5">
                        <div class="footer-card text-end">
                            <img src="assets/img/images/card.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

@include('frontend.layouts.components.scripts')
</body>
</html>
