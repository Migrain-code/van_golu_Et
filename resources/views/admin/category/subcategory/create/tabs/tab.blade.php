<div class="tab-pane fade @if($loop->first) show active @endif" id="kt_tab_pane_{{$row->code}}" role="tabpanel">

    <div class="fv-row mb-7">
        <!--begin::Label-->
        <label class="required fs-6 fw-semibold mb-2">Kategori Adı</label>
        <!--end::Label-->
        <!--begin::Input-->
        <input type="text" class="form-control form-control-solid" placeholder="" name="title[{{$row->code}}]" value="" />
        <!--end::Input-->
    </div>
    <div class="fv-row mb-7">
        <!--begin::Label-->
        <label class="required fs-6 fw-semibold mb-2">Seo Başlığı</label>
        <!--end::Label-->
        <!--begin::Input-->
        <input type="text" class="form-control form-control-solid" placeholder="" name="meta_title[{{$row->code}}]" value="" />
        <!--end::Input-->
    </div>

    <div class="fv-row mb-7">
        <!--begin::Label-->
        <label class="required fs-6 fw-semibold mb-2">Seo Açıklaması</label>
        <!--end::Label-->
        <!--begin::Input-->
        <textarea class="form-control form-control-solid" rows="7" placeholder="" name="meta_description[{{$row->code}}]"></textarea>
        <!--end::Input-->
    </div>

</div>
