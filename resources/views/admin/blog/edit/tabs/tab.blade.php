<div class="tab-pane fade @if($loop->first) show active @endif" id="kt_tab_pane_{{$row->code}}" role="tabpanel">

    <div class="fv-row mb-7">
        <!--begin::Label-->
        <label class="required fs-6 fw-semibold mb-2">Blog Başlığı</label>
        <!--end::Label-->
        <!--begin::Input-->
        <input type="text" class="form-control form-control-solid" placeholder="" name="title[{{$row->code}}]" value="{{$blog->getTranslation('name', $row->code)}}" />
        <!--end::Input-->
    </div>
    <div class="fv-row mb-7">
        <!--begin::Label-->
        <label class="required fs-6 fw-semibold mb-2">Seo Başlığı</label>
        <!--end::Label-->
        <!--begin::Input-->
        <input type="text" class="form-control form-control-solid" placeholder="" name="meta_title[{{$row->code}}]" value="{{$blog->getTranslation('meta_title', $row->code)}}" />
        <!--end::Input-->
    </div>

    <div class="fv-row mb-7">
        <!--begin::Label-->
        <label class="required fs-6 fw-semibold mb-2">Seo Açıklaması</label>
        <!--end::Label-->
        <!--begin::Input-->
        <textarea class="form-control form-control-solid" rows="7" placeholder="" name="meta_description[{{$row->code}}]">{{$blog->getTranslation('meta_description', $row->code)}}</textarea>
        <!--end::Input-->
    </div>

    <div class="fv-row mb-7">
        <!--begin::Label-->
        <label class="required fs-6 fw-semibold mb-2">İçerik</label>
        <!--end::Label-->
        <!--begin::Input-->
        <textarea id="kt_docs_tinymce_plugins" name="meta_content[{{$row->code}}]" class="tox-target tinyMiceEditor">{{$blog->getTranslation('content', $row->code)}}</textarea>
        <!--end::Input-->
    </div>
</div>
