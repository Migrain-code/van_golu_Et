<div class="tab-pane fade" id="kt_tab_pane_other" role="tabpanel">

    <div class="fv-row mb-7">
        <!--begin::Label-->
        <label class="required fs-6 fw-semibold mb-2 w-100">Referans Tanıtım Görseli (840 * 560)</label>
        <!--end::Label-->
        <img src="{{image($reference->image)}}" class="mb-2 w-200px" onclick="window.open('{{image($reference->image)}}')">
        <!--begin::Input-->
        <input type="file" class="form-control form-control-solid" placeholder="" name="image" value="" />
        <!--end::Input-->
    </div>

</div>
