<div class="tab-pane fade" id="kt_tab_pane_other" role="tabpanel">

    <div class="fv-row mb-7">
        <!--begin::Label-->
        <label class="required fs-6 fw-semibold mb-2">Şube Harita Kodu</label>
        <!--end::Label-->
        <!--begin::Input-->
        <textarea class="form-control form-control-solid" rows="7" placeholder="" name="embed_code">{{$branche->embed}}</textarea>
        <!--end::Input-->
    </div>
    <div class="fv-row mb-7">
        <div class="row">
            <img src="{{image($branche->image)}}" style="width: 150px;height: 150px;object-fit: cover">
        </div>
        <!--begin::Label-->
        <label class="required fs-6 fw-semibold mb-2">Şube Görseli</label>
        <!--end::Label-->
        <!--begin::Input-->
        <input type="file" class="form-control form-control-solid" placeholder="" name="image" value="" />
        <!--end::Input-->
    </div>
</div>
