<div class="tab-pane fade show active" id="kt_ecommerce_settings_general" role="tabpanel">
    <form enctype="multipart/form-data" class="form" action="{{route('admin.settings.update')}}" method="post">
        @csrf
        <!--begin::Modal body-->
        <div class="modal-body py-5 px-lg-17">
            <!--begin::Scroll-->
            <div class="scroll-y me-n7 pe-7" id="kt_modal_add_customer_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_customer_header" data-kt-scroll-wrappers="#kt_modal_add_customer_scroll" data-kt-scroll-offset="300px">
                <!--begin::Input group-->
                <div class="fv-row mb-7">
                    <!--begin::Label-->
                    <label class="fs-2hx fw-semibold mb-2">Genel Ayarlar</label>
                    <!--end::Label-->
                </div>

                <div class="fv-row mb-7">
                    <!--begin::Label-->
                    <label class="required fs-6 fw-semibold mb-2">Meta Title</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="text" class="form-control form-control-solid" placeholder="" name="speed_site_title" value="{{setting('speed_site_title')}}" />
                    <!--end::Input-->
                </div>
                <!--end::Input group-->
                <div class="fv-row mb-7">
                    <!--begin::Label-->
                    <label class="required fs-6 fw-semibold mb-2">Meta Description</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="text" class="form-control form-control-solid" placeholder="" name="speed_meta_description" value="{{setting('speed_meta_description')}}" />
                    <!--end::Input-->
                </div>
                <!--end::Input group-->
                <div class="fv-row mb-7">
                    <!--begin::Label-->
                    <label class="required fs-6 fw-semibold mb-2">Logo (Beyaz Yazılı) <a href="{{image(setting('speed_logo_white'))}}" target="_blank">Görüntüle</a></label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="file" class="form-control form-control-solid" placeholder="" name="speed_logo_white" value="" />
                    <!--end::Input-->
                </div>
                <!--end::Input group-->
                <div class="fv-row mb-7">
                    <!--begin::Label-->
                    <label class="required fs-6 fw-semibold mb-2">Logo (Siyah Yazılı) <a href="{{image(setting('speed_logo_dark'))}}" target="_blank">Görüntüle</a></label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="file" class="form-control form-control-solid" placeholder="" name="speed_logo_dark" value="Sean Bean" />
                    <!--end::Input-->
                </div>

                <div class="fv-row mb-7">
                    <!--begin::Label-->
                    <label class="required fs-6 fw-semibold mb-2">Favicon <a href="{{image(setting('speed_favicon'))}}" target="_blank">Görüntüle</a></label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="file" class="form-control form-control-solid" placeholder="" name="name" value="Sean Bean" />
                    <!--end::Input-->
                </div>
                <div class="fv-row mb-7">
                    <!--begin::Label-->
                    <label class="required fs-6 fw-semibold mb-2">Sayfalama Sayısı</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="file" class="form-control form-control-solid" placeholder="" name="speed_pagination_number" value="{{setting('speed_pagination_number')}}" />
                    <!--end::Input-->
                </div>
                <div class="fv-row mb-7">
                    <!--begin::Wrapper-->
                    <div class="d-flex flex-stack">
                        <!--begin::Label-->
                        <div class="me-5">
                            <!--begin::Label-->
                            <label class="fs-6 fw-semibold">Doğum Günü Mesajları Gönderilsin mi?</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <div class="fs-7 fw-semibold text-muted">Bu seçenek seçildiğinde doğrum günü yaklaşan müşterilere doğum günlerinde mesaj iletilir</div>
                            <!--end::Input-->
                        </div>
                        <!--end::Label-->
                        <!--begin::Switch-->
                        <label class="form-check form-switch form-check-custom form-check-solid">
                            <!--begin::Input-->
                            <input class="form-check-input" name="birthday_is_sms" type="checkbox" value="1" id="kt_modal_add_customer_billing" checked="checked">
                            <!--end::Input-->
                            <!--begin::Label-->
                            <span class="form-check-label fw-semibold text-muted" id="customerSendSms" for="kt_modal_add_customer_billing">Evet</span>
                            <!--end::Label-->
                        </label>
                        <!--end::Switch-->
                    </div>
                    <!--begin::Wrapper-->
                </div>
                <!--end::Input group-->

            </div>
            <!--end::Scroll-->
        </div>
        <!--end::Modal body-->
        <!--begin::Modal footer-->
        <div class="modal-footer flex-center">
            <!--begin::Button-->
            <button type="reset" id="kt_modal_add_customer_cancel" class="btn btn-light me-3">Discard</button>
            <!--end::Button-->
            <!--begin::Button-->
            <button type="submit" id="kt_modal_add_customer_submit" class="btn btn-primary">
                <span class="indicator-label">Submit</span>
                <span class="indicator-progress">Please wait...
															<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
            </button>
            <!--end::Button-->
        </div>
        <!--end::Modal footer-->
    </form>

</div>
