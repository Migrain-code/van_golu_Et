<div class="tab-pane fade show active" id="kt_tab_pane_1" role="tabpanel">

    <div class="fv-row mb-7">
        <!--begin::Label-->
        <label class="required fs-6 fw-semibold mb-2">Ad Soyad</label>
        <!--end::Label-->
        <!--begin::Input-->
        <input type="text" class="form-control form-control-solid" placeholder="" name="name" value="{{$contactRequest->name}}" />
        <!--end::Input-->
    </div>
    <div class="fv-row mb-7">
        <!--begin::Label-->
        <label class="required fs-6 fw-semibold mb-2">E-posta</label>
        <!--end::Label-->
        <!--begin::Input-->
        <input type="email" class="form-control form-control-solid" placeholder="" name="email" value="{{$contactRequest->email}}" />
        <!--end::Input-->
    </div>
    <div class="fv-row mb-7">
        <!--begin::Label-->
        <label class="required fs-6 fw-semibold mb-2">Konu</label>
        <!--end::Label-->
        <!--begin::Input-->
        <input type="text" class="form-control form-control-solid" placeholder="" name="subject" value="{{$contactRequest->subject}}" />
        <!--end::Input-->
    </div>
    <div class="fv-row mb-7">
        <!--begin::Label-->
        <label class="required fs-6 fw-semibold mb-2">Mesaj</label>
        <!--end::Label-->
        <!--begin::Input-->
        <textarea class="form-control form-control-solid" rows="7" placeholder="" name="message">{{$contactRequest->message}}</textarea>
        <!--end::Input-->
    </div>
</div>
