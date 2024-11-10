<div class="tab-pane fade" id="kt_tab_pane_other" role="tabpanel">

    <div class="fv-row mb-7">
        <!--begin::Label-->
        <label class="required fs-6 fw-semibold mb-2 w-">Kategori Görseli (1920 * 1200)</label>
        <!--end::Label-->
        <img src="{{image($referenceCategory->image)}}" class="mb-2" style="width: 200px;cursor: zoom-in" onclick="window.open('{{image($referenceCategory->image)}}')">
        <!--begin::Input-->
        <input type="file" class="form-control form-control-solid" placeholder="" name="image" value="" />
        <!--end::Input-->
    </div>

</div>
