<!-- team-area -->
<section class="team-area team-bg" data-background="/frontend/assets/img/bg/team_bg.jpg">
    <div class="container custom-container-two">
        <div class="row align-items-center">
            <div class="col-lg-4">
                <div class="team-content-wrap">
                    <div class="section-title white-title mb-50">
                        <span class="sub-title">{{__('Yönetim')}}</span>
                        <h2 class="title">{{__('Yönetim Kurulu')}}</h2>
                    </div>
                    <p>Van Gölü Et Kurucuları ve Yöneticileri </p>

                </div>
            </div>
            <div class="col-lg-8">
                <div class="team-item-wrap">
                    <div class="row justify-content-center">
                        @foreach($teams as $team)
                            <div class="col-lg-4 col-md-6 col-sm-8">
                                <div class="team-item">
                                    <div class="team-thumb">
                                        <img src="{{image($team->image)}}" alt="">
                                        <a href="javascript:void(0)" class="link-btn"><i class="fas fa-plus"></i></a>
                                    </div>
                                    <div class="team-content">
                                        <div class="line" data-background="assets/img/images/line.png"></div>
                                        <h4 class="title"><a href="javascript:void(0)">{{$team->name}}</a></h4>
                                        <span>{{$team->getMission()}}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- team-area-end -->
<section class="choose-area choose-area-two choose-bg" data-background="/frontend/assets/img/bg/choose_bg.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title text-center mb-50">
                    <span class="sub-title">{{__('Galeri')}}</span>
                    <h2 class="title">{{__('Resim Galerimiz')}}</h2>
                    <div class="title-shape" data-background="/frontend/assets/img/images/title_shape.png"></div>
                </div>
                <div class="d-flex gap-3" style="width: 1800px; overflow-x: auto">
                    @foreach($galleries as $gallery)
                        <div class="col-4">
                            <a href="{{image($gallery->image)}}" data-fancybox="gallery" data-caption="{{$loop->index}}">
                                <img src="{{image($gallery->image)}}" style="border-radius: 10px" />
                            </a>
                        </div>

                    @endforeach
                </div>
            </div>
        </div>

    </div>
</section>
