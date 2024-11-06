<!-- Video section -->
<div class="section" style="padding-top: 0px !important;">
    <div class="container ">
        <div class="d-flex justify-content-center align-items-center mb-4">
            <div class="row">
                <div class="col-12 text-center">
                    <h6 class="d-inline-block bg-gray border-radius
								 px-3 py-2 line-height-140 font-small uppercase letter-spacing-1 mb-3">
									<span class="text-color-theme">
										{{__("Video")}}
									</span>
                    </h6>
                    <h2 class="fw-bold mb-1">
                        {{__("Anasayfa Video Başlığı")}}
                    </h2>
                    <p class="">
                        {{__("Anasayfa Video Açıklaması")}}
                    </p>
                </div>

            </div>

        </div>
        <div class="img-box-icon border-radius-1 box-shadow">
            <a class="lightbox-media-box border-radius icon-xl" href="{{setting('main_page_video_link')}}">
                <img src="{{image(setting('main_page_video_cover_image'))}}" alt="">
                <i class="bi bi-play"></i>
            </a>
        </div>
    </div>
</div>
<!-- end Video section -->
