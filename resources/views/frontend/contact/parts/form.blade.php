<!-- Contact Form section -->
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-4">
                    <h1>{{__('İletişim')}}</h1>
                    <div class="mb-4">
                        <h5 class="fw-medium mb-1" style="border-bottom: 1px solid rgb(219 215 215 / 45%)">{{__('Fabrika')}}:</h5>
                        <p class="p-3">{{setting('speed_contact_address_1')}}</p>
                    </div>
                    <div class="mb-4">
                        <h5 class="fw-medium mb-1" style="border-bottom: 1px solid rgb(219 215 215 / 45%)">{{__('İhracat Ofisi')}}:</h5>
                        <p class="p-3">{{setting('speed_contact_address_2')}}</p>
                    </div>
            </div>
            <div class="col-8">
                <div class="contact-form border w-100 p-3">
                    <h1 class="text-center">{{__('Bizimle İletişime Geçin')}}</h1>
                    <form method="post" action="{{route('contact.sendForm')}}">
                        @csrf

                        <div class="row gx-3 gy-0">
                            <div class="col-12 col-sm-6">
                                <input type="text" id="name" name="name" placeholder="{{__('Ad Soyad')}}" required="">
                            </div>
                            <div class="col-12 col-sm-6">
                                <input type="email" id="email" name="email" placeholder="{{__('E-Posta')}}" required="">
                            </div>
                        </div>
                        <input type="text" id="subject" name="subject" placeholder="{{__('Konu')}}" required="">
                        <textarea name="message" id="message" placeholder="{{__('Mesajınız')}}"></textarea>
                        <div class="g-recaptcha" data-sitekey="6LdDK3gqAAAAANS6rXO2fn9uLGROtZI22EryeKky"></div>
                        <br/>
                        <div class="d-flex text-end">

                            <button class="button button-lg button-rounded button-outline-dark ms-auto" type="submit">{{__('Mesaj Gönder')}}</button>

                        </div>
                    </form>
                    <!-- Submit result -->
                </div><!-- end contact-form -->
            </div>
        </div>

    </div><!-- end container -->
</div>
<!-- end Contact Form section -->
