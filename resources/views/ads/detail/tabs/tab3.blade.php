<div class="tab-pane fade" id="kt_tab_pane_3" role="tabpanel">
    <div class="fv-row mb-7">
        <!--begin::Label-->
        <label class="fs-6 fw-semibold mb-2">
            <span class="required">Link</span>
            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Link alanı zorunludur"></i>
        </label>
        <!--end::Label-->
        <!--begin::Input-->
        <input type="text" class="form-control form-control-solid" placeholder="" name="link" value="{{$advert->link}}" />
        <!--end::Input-->
    </div>
    <div class="fv-row mb-7">
        <!--begin::Label-->
        <label class="fs-6 fw-semibold mb-2">
            <span class="required">Görsel</span>
            <i class="fas fa-exclamation-circle ms-1 fs-7 me-2" data-bs-toggle="tooltip" title="Link alanı zorunludur"></i>
            <a href="{{image($advert->image)}}" target="_blank">Görüntüle</a>
        </label>
        <!--begin::Input-->
        <input type="file" class="form-control form-control-solid" placeholder="" name="ads_image" value="" />
        <!--end::Input-->
    </div>
    <div class="fv-row mb-7">
        <!--begin::Label-->
        <label class="fs-6 fw-semibold mb-2">
            <span class="required">Marka Logo</span>
            <i class="fas fa-exclamation-circle ms-1 fs-7 me-2" data-bs-toggle="tooltip" title="Link alanı zorunludur"></i>
            <a href="{{image($advert->logo)}}" target="_blank">Görüntüle</a>
        </label>
        <!--begin::Input-->
        <input type="file" class="form-control form-control-solid" placeholder="" name="logo" value="" />
        <!--end::Input-->
    </div>
    <div class="fv-row mb-7">
        <!--begin::Label-->
        <label class="fs-6 fw-semibold mb-2">
            <span class="required">Tür Seçiniz</span>
            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Link alanı zorunludur"></i>
        </label>
        <!--end::Label-->
        <!--begin::Input-->
        <select name="type" class="form-control form-select-solid">
            @foreach($typeList as $key=>$type)
                <option value="{{$key}}" @selected($advert->type == $key)>{{$type["name"]}}</option>
            @endforeach
        </select>
        <!--end::Input-->
    </div>
</div>
