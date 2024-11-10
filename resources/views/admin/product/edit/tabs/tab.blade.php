<div class="tab-pane fade @if($loop->first) show active @endif" id="kt_tab_pane_{{$row->code}}" role="tabpanel">

    <div class="fv-row mb-7">
        <!--begin::Label-->
        <label class="required fs-6 fw-semibold mb-2">Ürün Adı</label>
        <!--end::Label-->
        <!--begin::Input-->
        <input type="text" class="form-control form-control-solid" placeholder="" name="title[{{$row->code}}]" value="{{$product->getTranslation('name', $row->code)}}" />
        <!--end::Input-->
    </div>
    <div class="fv-row mb-7">
        <!--begin::Label-->
        <label class="required fs-6 fw-semibold mb-2">Ürün Açıklaması</label>
        <!--end::Label-->
        <!--begin::Input-->
        <textarea class="form-control form-control-solid" rows="7" placeholder="" name="short_description[{{$row->code}}]">{{$product->getTranslation('description', $row->code)}}</textarea>
        <!--end::Input-->
    </div>
    <div class="fv-row mb-7">
        <!--begin::Label-->
        <label class="required fs-6 fw-semibold mb-2">Seo Başlığı</label>
        <!--end::Label-->
        <!--begin::Input-->
        <input type="text" class="form-control form-control-solid" placeholder="" name="meta_title[{{$row->code}}]" value="{{$product->getTranslation('meta_title', $row->code)}}" />
        <!--end::Input-->
    </div>

    <div class="fv-row mb-7">
        <!--begin::Label-->
        <label class="required fs-6 fw-semibold mb-2">Seo Açıklaması</label>
        <!--end::Label-->
        <!--begin::Input-->
        <textarea class="form-control form-control-solid" rows="7" placeholder="" name="meta_description[{{$row->code}}]">{{$product->getTranslation('meta_description', $row->code)}}</textarea>
        <!--end::Input-->
    </div>

    <div class="fv-row mb-7">
        <!--begin::Label-->
        <label class="required fs-6 fw-semibold mb-2">Avantajları</label>
        <!--end::Label-->
        <!--begin::Input-->
        <textarea class="form-control form-control-solid tinyMiceEditor" rows="7" placeholder="" name="advantage[{{$row->code}}]">{{$product->getTranslation('advantage', $row->code)}}</textarea>
        <!--end::Input-->
    </div>
    <div class="fv-row mb-7">
        <!--begin::Label-->
        <label class="required fs-6 fw-semibold mb-2">Teknik Özellikleri</label>
        <!--end::Label-->
        <!--begin::Input-->
        <textarea id="kt_docs_tinymce_plugins" name="technic[{{$row->code}}]" class="tox-target tinyMiceEditor">{{$product->getTranslation('technic', $row->code)}}</textarea>
        <!--end::Input-->
    </div>
</div>
