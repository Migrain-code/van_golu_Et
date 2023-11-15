<div class="modal fade" id="kt_modal_add_notification" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Form-->
            <form class="form" action="#" id="kt_modal_add_notification_form">
                <!--begin::Modal header-->
                <div class="modal-header" id="kt_modal_add_notification_header">
                    <!--begin::Modal title-->
                    <h2 class="fw-bold">Bildirim Oluştur</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div id="kt_modal_add_notification_close" class="btn btn-icon btn-sm btn-active-icon-primary">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                        <span class="svg-icon svg-icon-1">
																<svg width="24" height="24" viewBox="0 0 24 24"
                                                                     fill="none" xmlns="http://www.w3.org/2000/svg">
																	<rect opacity="0.5" x="6" y="17.3137" width="16"
                                                                          height="2" rx="1"
                                                                          transform="rotate(-45 6 17.3137)"
                                                                          fill="currentColor"/>
																	<rect x="7.41422" y="6" width="16" height="2" rx="1"
                                                                          transform="rotate(45 7.41422 6)"
                                                                          fill="currentColor"/>
																</svg>
															</span>
                        <!--end::Svg Icon-->
                    </div>
                    <!--end::Close-->
                </div>
                <!--end::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body py-10 px-lg-17">
                    <!--begin::Scroll-->
                    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_notification_scroll"
                         data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}"
                         data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_notification_header"
                         data-kt-scroll-wrappers="#kt_modal_add_notification_scroll" data-kt-scroll-offset="300px">
                        <!--begin::Billing form-->
                        <div id="kt_modal_add_notification_billing_info" class="collapse show">
                            <!--begin::Input group-->
                            <div class="d-flex flex-column mb-7 fv-row">
                                <!--begin::Label-->
                                <label class="fs-6 fw-semibold mb-2 required">Bildirim Başlığı</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input class="form-control form-control-solid" placeholder="" name="title" value=""/>
                                <!--end::Input-->
                            </div>
                            <input type="hidden" name="customer_id" value="{{$customer->id}}">
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="d-flex flex-column mb-7 fv-row">
                                <!--begin::Label-->
                                <label class="fs-6 fw-semibold mb-2 required">Bildirim İçeriği</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <textarea class="form-control form-control-solid" placeholder="" rows="7"
                                          name="notification_text"></textarea>
                                <!--end::Input-->
                            </div>
                            <div class="d-flex flex-column mb-7 fv-row">
                                <label class="fs-6 fw-semibold mb-2 required">Bildirim İkonu Seçin</label>

                                @foreach($noticifationIcons as $icon)
                                    <label class="d-flex flex-stack mb-5 cursor-pointer">
                                        <!--begin:Label-->
                                        <span class="d-flex align-items-center me-2">
                                            <span class="symbol symbol-50px me-6">
                                                <span class="symbol-label" style="background: {{$icon->background}}">
                                                    <img src="{{image($icon->icon)}}">
                                                </span>
                                            </span>
                                            <!--end:Icon-->

                                            <!--begin:Info-->
                                            <span class="d-flex flex-column">
                                                <span class="fw-bold fs-6">{{$icon->title}}</span>
                                                <span class="fs-7 text-muted">{{$icon->decription}}</span>
                                            </span>
                                            <!--end:Info-->
                                        </span>
                                        <!--end:Label-->

                                        <!--begin:Input-->
                                        <span class="form-check form-check-custom form-check-solid">
                                             <input class="form-check-input" type="radio" name="notification_icon" value="{{$icon->icon}}"/>
                                        </span>

                                        <!--end:Input-->
                                    </label>
                                @endforeach

                            </div>

                            <div class="fv-row mb-7">
                                <!--begin::Wrapper-->
                                <div class="d-flex flex-stack">
                                    <!--begin::Label-->
                                    <div class="me-5">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-semibold">Mobil Bildirim Gönderilsin mi?</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <div class="fs-7 fw-semibold text-muted">Kullanıcının sistemde kayıtlı aygıtı varsa bildirim gönderilsin mi?</div>
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Label-->
                                    <!--begin::Switch-->
                                    <label class="form-check form-switch form-check-custom form-check-solid">
                                        <!--begin::Input-->
                                        <input class="form-check-input" name="is_push" type="checkbox" id="kt_modal_add_address_billing" checked="checked" />
                                        <!--end::Input-->
                                        <!--begin::Label-->
                                        <span class="form-check-label fw-semibold text-muted" for="kt_modal_add_address_billing">Yes</span>
                                        <!--end::Label-->
                                    </label>
                                    <!--end::Switch-->
                                </div>
                                <!--begin::Wrapper-->
                            </div>
                        </div>
                        <!--end::Billing form-->
                    </div>
                    <!--end::Scroll-->
                </div>
                <!--end::Modal body-->
                <!--begin::Modal footer-->
                <div class="modal-footer flex-center">
                    <!--begin::Button-->
                    <button type="reset" id="kt_modal_add_notification_cancel" class="btn btn-light me-3">Discard</button>
                    <!--end::Button-->
                    <!--begin::Button-->
                    <button type="submit" id="kt_modal_add_notification_submit" class="btn btn-primary">
                        <span class="indicator-label">Submit</span>
                        <span class="indicator-progress">Please wait...
															<span
                                                                class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                    <!--end::Button-->
                </div>
                <!--end::Modal footer-->
            </form>
            <!--end::Form-->
        </div>
    </div>
</div>
