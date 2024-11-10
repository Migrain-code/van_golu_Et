<div class="tab-pane fade @if($loop->first) show active @endif" id="kt_tab_pane_{{$row->code}}" role="tabpanel">

    <div class="fv-row mb-7">
        <!--begin::Label-->
        <label class="required fs-6 fw-semibold mb-2">Referans Adı</label>
        <!--end::Label-->
        <!--begin::Input-->
        <input type="text" class="form-control form-control-solid" placeholder="" name="title[{{$row->code}}]" value="{{$reference->getTranslation('name', $row->code)}}" />
        <!--end::Input-->
    </div>
    <div class="fv-row mb-7">
        <!--begin::Label-->
        <label class="required fs-6 fw-semibold mb-2">Referans Açıklaması</label>
        <!--end::Label-->
        <!--begin::Input-->
        <textarea class="form-control form-control-solid" rows="7" placeholder="" name="short_description[{{$row->code}}]">{{$reference->getTranslation('description', $row->code)}}</textarea>
        <!--end::Input-->
    </div>
    <div class="fv-row mb-7">
        <!--begin::Label-->
        <label class="required fs-6 fw-semibold mb-2">Seo Başlığı</label>
        <!--end::Label-->
        <!--begin::Input-->
        <input type="text" class="form-control form-control-solid" placeholder="" name="meta_title[{{$row->code}}]" value="{{$reference->getTranslation('meta_title', $row->code)}}" />
        <!--end::Input-->
    </div>

    <div class="fv-row mb-7">
        <!--begin::Label-->
        <label class="required fs-6 fw-semibold mb-2">Seo Açıklaması</label>
        <!--end::Label-->
        <!--begin::Input-->
        <textarea class="form-control form-control-solid" rows="7" placeholder="" name="meta_description[{{$row->code}}]">{{$reference->getTranslation('meta_description', $row->code)}}</textarea>
        <!--end::Input-->
    </div>

    <div class="fv-row mb-7">
        <!--begin::Label-->
        <label class="required fs-6 fw-semibold mb-2">İçeriği</label>
        <!--end::Label-->
        <!--begin::Input-->
        <textarea id="kt_docs_tinymce_plugins" name="technic[{{$row->code}}]" class="tox-target tinyMiceEditor">{{$reference->getTranslation('content', $row->code)}}</textarea>
        <!--end::Input-->
    </div>
</div>
