<!-- testimonial-area -->
<section class="testimonial-area testimonial-bg" data-background="/frontend/assets/img/bg/testimonial_bg.jpg">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-md-8">
                <div class="section-title mb-60">
                    <span class="sub-title">{{__("Referanslar")}}</span>
                    <h2 class="title"> {{__('Anasayfa Referanslar Başlık')}}</h2>
                    <p> {{__('Anasayfa Referanslar Açıklama')}}</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="testimonial-nav"></div>
            </div>
        </div>
        <div class="row testimonial-active">
            @foreach($references as $rowReference)
            <div class="col-lg-6">
            <div class="testimonial-item">
                <div class="testimonial-content">
                    <div class="icon"><i class="flaticon-quotation"></i></div>
                    <p>
                        {{$rowReference->getDescription()}}
                    </p>
                    <div class="testimonial-avatar">
                        <div class="thumb">
                            <img src="{{image($rowReference->image)}}" alt="">
                        </div>
                        <div class="content">
                            <h4 class="title fw-bold">{{ $rowReference->getName() }}</h4>
                            <span>Müşteri</span>
                        </div>
                    </div>
                    <div class="overlay-icon">
                        <i class="flaticon-quotation"></i>
                    </div>
                </div>
                <div class="testimonial-shape">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 626 367" preserveAspectRatio="none">
                        <path d="M331,5709H917a20,20,0,0,1,20,20l-29,327a20,20,0,0,1-20,20H361a20,20,0,0,1-20-20l-30-327A20,20,0,0,1,331,5709Z" transform="translate(-311 -5709)" />
                    </svg>
                </div>
            </div>
        </div>
            @endforeach

        </div>
    </div>
</section>
<!-- testimonial-area-end -->

