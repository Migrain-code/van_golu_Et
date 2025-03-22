<!-- product-area -->
<section class="product-area-four tg-motion-effects product-bg-four pt-0" data-background="/frontend/assets/img/bg/h3_product_bg.jpg">
    <div class="product-bg-shape" data-background="/frontend/assets/img/images/h3_product_bg_shape.png"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title title-style-two text-center mb-60">
                    <span class="sub-title">{{__("Ürünler")}}</span>
                    <h2 class="title">{{__('Anasayfa Ürünler Başlık')}}</h2>
                    <p>{{__('Anasayfa Ürünler Açıklama')}}</p>
                    <div class="title-shape" data-background="/frontend/assets/img/images/title_shape.png"></div>
                </div>
            </div>
        </div>
        <div class="product-item-wrap-four">
            <div class="row justify-content-center">
                @foreach($products as $product)
                    @php
                        $link = route('product.detail', $product->getSlug());
                    @endphp
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-8">
                        <div class="product-item-four">
                            <div class="product-thumb-four">
                                <a href="{{$link}}"><img src="{{image($product->image)}}" alt=""></a>
                                <span class="batch"><i class="fas fa-star"></i></span>
                            </div>
                            <div class="product-content-four">
                                <div class="line" data-background="/frontend/assets/img/images/line.png"></div>
                                <h2 class="title"><a href="{{$link}}">{{$product->getName()}}</a></h2>
                                {{--  <h4 class="price">{{formatPrice($product->price)}}</h4> --}}
                                <div class="product-tag">
                                    <ul class="list-wrap">
                                        <li><a href="{{$link}}">{{$product->category->getName()}}</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-shape-four">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 333 431" preserveAspectRatio="none">
                                    <path d="M258,2672H551a20,20,0,0,1,20,20l-15,391a20,20,0,0,1-20,20H273a20,20,0,0,1-20-20l-15-391A20,20,0,0,1,258,2672Z" transform="translate(-238 -2672)" />
                                </svg>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="shop-now-btn text-center mt-20">
                <a href="{{route('product.index')}}" class="btn btn-two">{{__('Tüm Ürünler')}}</a>
            </div>
        </div>
    </div>
    <div class="product-shape-wrap">
        <img src="/frontend/assets/img/product/h3_product_shape_img01.png" alt="" class="tg-motion-effects4">
        <img src="/frontend/assets/img/product/h3_product_shape_img02.png" alt="" class="tg-motion-effects6">
        <img src="/frontend/assets/img/product/h3_product_shape_img03.png" alt="" class="tg-motion-effects5">
    </div>
</section>
<!-- product-area-end -->
