<div class="tab-pane fade show active" id="kt_tab_pane_other" role="tabpanel">
    <div class="fv-row mb-7">
        <!--begin::Label-->
        <label class="required fs-6 fw-semibold mb-2">Üye Adı</label>
        <!--end::Label-->
        <!--begin::Input-->
        <input type="text" class="form-control form-control-solid" placeholder="" name="name" value="{{$team->name}}" />
        <!--end::Input-->
    </div>
    <div class="fv-row mb-7">
        <!--begin::Label-->
        <label class="required fs-6 fw-semibold mb-2 w-100">Üye Görseli (500 * 500)</label>
        <!--end::Label-->
        <img src="{{image($team->image)}}" style="width: 200px;margin-bottom: 15px;">
        <!--begin::Input-->
        <input type="file" class="form-control form-control-solid" placeholder="" name="image" value="" />
        <!--end::Input-->
    </div>

</div>
