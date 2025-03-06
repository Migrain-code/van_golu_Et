<section class="cta-area cta-area-two position-relative d-flex align-items-center justify-content-center"
         style="height: 600px;">
    <div class="cta-bg cta-bg-two" data-background="{{image(setting('main_page_video_cover_image'))}}"></div>
    <img src="/frontend/assets/img/icons/vector.png" alt="" style="width: 100px;cursor: pointer">
    <!-- cta-area-end -->
    <iframe style="position: absolute;" width="100%" height="600px"
            src="{{ setting('main_page_video_link') }}?autoplay=1&mute=1"
            title="YouTube video player"
            frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen>
    </iframe>
</section>

