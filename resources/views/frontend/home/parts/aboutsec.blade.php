<!-- About section -->
<div class="section" style="padding: 50px 0;">
    <div class="container">
        @foreach($parts as $part)
            <div class="row g-4 g-lg-5 mt-3 ">
                <div class="col-12 col-lg-6 @if($part->image_rotation == 1) order-lg-2 @endif">
                    <div class="img-box-icon border-radius-1 box-shadow">
                        <a class="lightbox-media-box border-radius icon-xl"
                           href="{{image($part->image)}}">
                            <img src="{{image($part->image)}}" alt="">
                        </a>
                    </div>
                </div>

                <div class="col-12 col-lg-6">
                    <h2 class="fw-bold mb-3">
                        {{$part->getTitle()}}
                    </h2>
                    <p>
                        {{$part->getDescription()}}
                    </p>
                    <div class="d-flex gap-2 mt-4">
                        @foreach(range(1, 3) as $rw)
                            <div class="col-4 d-inline-block bg-gray border-radius p-3">
                                <h1 class="fw-normal line-height-120 text-color-theme mb-0">
                                    <span class="counter">{{ $part->{'getBox' . $rw . 'Counter'}() }}</span>+
                                </h1>
                                <p>{{ $part->{'getBox' . $rw . 'Title'}() }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach

    </div><!-- end container -->
</div>
