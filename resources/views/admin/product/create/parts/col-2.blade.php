<!--begin::Main column-->
<div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
    <!--begin:::Tabs-->
    <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-semibold mb-n2">
        <!--begin:::Tab item-->
        <li class="nav-item">
            <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab" href="#kt_ecommerce_add_product_general">Genel</a>
        </li>
        <!--end:::Tab item-->
        <!--begin:::Tab item-->
        <li class="nav-item">
            <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#kt_ecommerce_add_product_advanced">Gelişmiş</a>
        </li>
        <!--end:::Tab item-->
    </ul>
    <!--end:::Tabs-->
    <!--begin::Tab content-->
    <div class="tab-content">
        @include('admin.product.create.tabs.tab-1')
        @include('admin.product.create.tabs.tab-2')

    </div>
    <!--end::Tab content-->
    <div class="d-flex justify-content-end">
        <!--begin::Button-->
        <a href="{{route('admin.product.index')}}" id="kt_ecommerce_add_product_cancel" class="btn btn-light me-5">İptal Et</a>
        <!--end::Button-->
        <!--begin::Button-->
        <button type="submit" id="kt_ecommerce_add_product_submit" class="btn btn-primary">
            <span class="indicator-label">Kaydet</span>
            <span class="indicator-progress">Kaydediliyor...
													<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
        </button>
        <!--end::Button-->
    </div>
</div>
<!--end::Main column-->
