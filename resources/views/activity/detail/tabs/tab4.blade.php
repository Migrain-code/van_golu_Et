<div class="tab-pane fade" id="kt_tab_pane_4" role="tabpanel">
    <div class="fv-row mb-7">
        <div class="mb-0">
            <label class="fs-6 fw-semibold mb-2">
                <span class="required">Başlangıç - Bitiş Zamanı</span>
                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Etkinliğin Yapılacağı Şehir"></i>
            </label>
            <input class="form-control form-control-solid" name="activity_date" placeholder="Pick date rage" id="kt_daterangepicker_2"/>
        </div>
        <!--end::Input-->
    </div>
    <div class="fv-row mb-7">
        <!--begin::Label-->
        <label class="fs-6 fw-semibold mb-2">
            <span class="required">Telefon</span>
            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="İletişim Numarası."></i>
        </label>
        <!--end::Label-->
        <!--begin::Input-->
        <input type="text" class="form-control form-control-solid" placeholder="" name="phone" value="{{$activity->phone}}" />
        <!--end::Input-->
    </div>
    <div class="fv-row mb-7">
        <!--begin::Label-->
        <label class="fs-6 fw-semibold mb-2">
            <span class="required">Otel adı</span>
            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Etkinliğin Yapılacağı Alan/Otel vb."></i>
        </label>
        <!--end::Label-->
        <!--begin::Input-->
        <input type="text" class="form-control form-control-solid" placeholder="" name="hotel_name" value="{{$activity->hotel_name}}" />
        <!--end::Input-->
    </div>
    <div class="fv-row mb-7">
        <!--begin::Label-->
        <label class="fs-6 fw-semibold mb-2">
            <span class="required">Video Kodu</span>
            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Etkinlik video (embed) kodu"></i>
        </label>
        <!--end::Label-->
        <!--begin::Input-->
        <textarea type="text" class="form-control form-control-solid" rows="7" placeholder="" name="embed_code">{{$activity->embed}}</textarea>
        <!--end::Input-->
    </div>
    <div class="fv-row mb-7">
        <!--begin::Label-->
        <label class="fs-6 fw-semibold mb-2">
            <span class="required">Şehir Seçiniz</span>
            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Etkinliğin Yapılacağı Şehir"></i>
        </label>
        <!--end::Label-->
        <!--begin::Input-->
        <select name="city_id" class="form-control form-select-solid">
            @foreach($cities as $city)
                <option value="{{$city->id}}" @selected($activity->city_id == $city->id)>{{$city->name}}</option>
            @endforeach
        </select>
        <!--end::Input-->
    </div>

</div>
