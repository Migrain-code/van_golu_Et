<div class="tab-pane fade" id="kt_tab_pane_2" role="tabpanel">

    <div class="fv-row mb-7">
        <!--begin::Label-->
        <label class="fs-6 fw-semibold mb-2">
            <span class="required">İkon <a href="{{image($serviceCategory->image)}}" target="_blank">(Görüntüle)</a></span>
            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Kategori Görseli zorunludur"></i>
        </label>
        <!--end::Label-->
        <!--begin::Input-->
        <input type="file" class="form-control form-control-solid" placeholder="" name="category_icon" value="" />
        <!--end::Input-->
    </div>

    <div class="fv-row mb-7">
        <!--begin::Label-->
        <label class="fs-6 fw-semibold mb-2">
            <span class="required">Tanıtım Görseli <a href="{{image($serviceCategory->cover_image)}}" target="_blank">(Görüntüle)</a></span>
            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Kategori Görseli zorunludur"></i>
        </label>
        <!--end::Label-->
        <!--begin::Input-->
        <input type="file" class="form-control form-control-solid" placeholder="" name="cover_image" value="" />
        <!--end::Input-->
    </div>


</div>
