<!-- product section -->
<div class="section" style="padding-top: 0px !important;">
    <div class="container">
        <div class="d-flex justify-content-center align-items-center mb-4">
            <div class="row">
                <div class="col-12 text-center">
                    <h6 class="d-inline-block bg-gray border-radius
								 px-3 py-2 line-height-140 font-small uppercase letter-spacing-1 mb-3">
									<span class="text-color-theme">
										{{__("Referanslar")}}
									</span>
                    </h6>
                    <h2 class="fw-bold mb-1">
                        {{__('Anasayfa Referanslar Başlık')}}
                    </h2>
                    <p class="">
                        {{__('Anasayfa Referanslar Açıklama')}}
                    </p>
                </div>

            </div>

        </div>
        <div class="mb-0">
            <div class="row g-3 g-lg-4">
                    @foreach($references as $rowReference)
                        <div class="col-12 col-lg-4 mb-3">
                            <div class="hoverbox-4 bottom border-radius">
                                <img src="{{image($rowReference->image)}}" style="min-height: 315px;object-fit: cover" alt="">
                                <div class="content">
                                    <h5 style="margin-bottom: -5px;">{{ $rowReference->getName() }}</h5>
                                    <p>{{$rowReference->getDescription()}}</p>
                                </div>
                                <div class="hover-content">

                                    <a class="button button-md button-radius button-outline-white" href="{{route('reference.detail', [$rowReference->category->getSlug(),$rowReference->getSlug()])}}">{{ __('Detay') }}</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
            </div>

        </div>
    </div>
</div>
<!-- end product section -->
