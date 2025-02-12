<!-- about-area -->
<section class="about-area-two">
    <div class="container">
        @foreach($parts as $part)
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-6 col-md-9 @if($part->image_rotation == 1) order-lg-2 @endif">
                <div class="about-img-wrap">
                    <img src="{{image($part->image)}}" alt="">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-content-two">
                    <div class="section-title mb-40">
                        <span class="sub-title">{{$part->getSubTitle()}}</span>
                        <h2 class="title"> {{$part->getTitle()}}</h2>
                    </div>
                    <p> {{$part->getDescription()}}</p>

                    <div class="about-info-wrap">
                        <ul class="list-wrap" style="justify-content: left">
                            @foreach(range(1, 2) as $rw)
                                <li>
                                    <div class="icon">
                                        <i class="fa fa-clock" style="color: #df2614;
    background: white;
    border-radius: 50%;"></i>
                                    </div>
                                    <div class="content">
                                        <h4 class="title">{{ $part->{'getBox' . $rw . 'Counter'}() }}</h4>
                                        <span>{{ $part->{'getBox' . $rw . 'Title'}() }}</span>
                                    </div>
                                </li>

                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
<!-- about-area-end -->
