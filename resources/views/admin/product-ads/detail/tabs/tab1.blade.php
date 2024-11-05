<div class="tab-pane fade show active" id="kt_tab_pane_1" role="tabpanel">
    <div class="fv-row mb-7">
        <!--begin::Label-->
        <label class="required fs-6 fw-semibold mb-2">Ürün Adı (Türkçe)</label>
        <!--end::Label-->
        <!--begin::Input-->
        <input type="text" class="form-control form-control-solid" placeholder="" name="product_name[tr]" value="{{$productAdvert->getTranslation('name', 'tr')}}" />
        <!--end::Input-->
    </div>
    <div class="fv-row mb-7">
        <!--begin::Label-->
        <label class="required fs-6 fw-semibold mb-2">Ürün Adı (İngilizce)</label>
        <!--end::Label-->
        <!--begin::Input-->
        <input type="text" class="form-control form-control-solid" placeholder="" name="product_name[en]" value="{{$productAdvert->getTranslation('name', 'en')}}" />
        <!--end::Input-->
    </div>
    <div class="fv-row mb-7">
        <!--begin::Label-->
        <label class="required fs-6 fw-semibold mb-2">Ürün Adı (Almanca)</label>
        <!--end::Label-->
        <!--begin::Input-->
        <input type="text" class="form-control form-control-solid" placeholder="" name="product_name[de]" value="{{$productAdvert->getTranslation('name', 'de')}}" />
        <!--end::Input-->
    </div>

    <div class="fv-row mb-7">
        <!--begin::Label-->
        <label class="required fs-6 fw-semibold mb-2">Ürün Adı (İspanyolca)</label>
        <!--end::Label-->
        <!--begin::Input-->
        <input type="text" class="form-control form-control-solid" placeholder="" name="product_name[es]" value="{{$productAdvert->getTranslation('name', 'es')}}" />
        <!--end::Input-->
    </div>

    <div class="fv-row mb-7">
        <!--begin::Label-->
        <label class="required fs-6 fw-semibold mb-2">Ürün Adı (Fransızca)</label>
        <!--end::Label-->
        <!--begin::Input-->
        <input type="text" class="form-control form-control-solid" placeholder="" name="product_name[fr]" value="{{$productAdvert->getTranslation('name', 'fr')}}" />
        <!--end::Input-->
    </div>

    <div class="fv-row mb-7">
        <!--begin::Label-->
        <label class="required fs-6 fw-semibold mb-2">Ürün Adı (İtalyanca)</label>
        <!--end::Label-->
        <!--begin::Input-->
        <input type="text" class="form-control form-control-solid" placeholder="" name="product_name[it]" value="{{$productAdvert->getTranslation('name', 'it')}}" />
        <!--end::Input-->
    </div>
</div>
