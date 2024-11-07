<div class="tab-pane fade" id="kt_ecommerce_settings_contact" role="tabpanel">
    <!--begin::Form-->
    <form method="post" class="form" action="{{route('admin.settings.update')}}" enctype="multipart/form-data">
        @csrf
        <!--begin::Heading-->
        <div class="row my-3">
            <div class="col-md-9 offset-md-3">
                <h2>İletişim Sayfası Güncelleme Formu</h2>
            </div>
        </div>
        <!--end::Heading-->
        <!--begin::Input group-->
        <div class="row fv-row mb-3">
            <div class="col-md-3 text-md-end">
                <!--begin::Label-->
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span>Görsel (2000 * 133)</span>
                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="İletişim sayfanızdaki en üstteki görsel"></i>
                </label>
                <!--end::Label-->
            </div>
            <div class="col-md-9">
                <div class="d-flex mt-3">
                    <!--begin::Radio-->
                    <input type="file" class="form-control form-control-solid" name="speed_contact_image" value="" />
                    <!--end::Radio-->
                </div>
            </div>
            <div class="col-md-3 text-md-end">
                <!--begin::Label-->
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span>Telefon</span>
                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="İşletmeler için sayfasındaki hakkımızda alanı başlık"></i>
                </label>
                <!--end::Label-->
            </div>
            <div class="col-md-9">
                <div class="d-flex mt-3">
                    <!--begin::Radio-->
                    <input type="text" class="form-control form-control-solid" name="speed_contact_phone" value="{{setting('speed_contact_phone')}}" />
                    <!--end::Radio-->
                </div>
            </div>
            <div class="col-md-3 text-md-end">
                <!--begin::Label-->
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span>Fax</span>
                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="hakkımızda sayfasındaki fax alanı"></i>
                </label>
                <!--end::Label-->
            </div>
            <div class="col-md-9">
                <div class="d-flex mt-3">
                    <!--begin::Radio-->
                    <input type="text" class="form-control form-control-solid" name="speed_contact_fax" value="{{setting('speed_contact_fax')}}" />
                    <!--end::Radio-->
                </div>
            </div>
        </div>
        <div class="row fv-row mb-3">
            <div class="col-md-3 text-md-end">
                <!--begin::Label-->
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span>E-posta</span>
                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="İşletmeler için sayfasındaki hakkımızda alanı başlık"></i>
                </label>
                <!--end::Label-->
            </div>
            <div class="col-md-9">
                <div class="d-flex mt-3">
                    <!--begin::Radio-->
                    <input type="text" class="form-control form-control-solid" name="speed_contact_email" value="{{setting('speed_contact_email')}}" />
                    <!--end::Radio-->
                </div>
            </div>
        </div>
        <!--end::Input group-->
        <div class="row fv-row mb-3">
            <div class="col-md-3 text-md-end">
                <!--begin::Label-->
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span>Kısa adres </span>
                    <i class="fas fa-exclamation-circle ms-1 fs-7"></i>
                </label>
                <!--end::Label-->
            </div>
            <div class="col-md-9">
                <div class="d-flex mt-3">
                    <!--begin::Radio-->
                    <textarea class="form-control form-control-solid" name="speed_contact_address" rows="3">{{setting('speed_contact_address')}}</textarea>
                    <!--end::Radio-->
                </div>
            </div>
            <div class="col-md-3 text-md-end">
                <!--begin::Label-->
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span>Uzun adres 1</span>
                    <i class="fas fa-exclamation-circle ms-1 fs-7"></i>
                </label>
                <!--end::Label-->
            </div>
            <div class="col-md-9">
                <div class="d-flex mt-3">
                    <!--begin::Radio-->
                    <textarea class="form-control form-control-solid" name="speed_contact_address_1" rows="6">{{setting('speed_contact_address_1')}}</textarea>
                    <!--end::Radio-->
                </div>
            </div>
            <div class="col-md-3 text-md-end">
                <!--begin::Label-->
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span>Uzun adres 2</span>
                    <i class="fas fa-exclamation-circle ms-1 fs-7"></i>
                </label>
                <!--end::Label-->
            </div>
            <div class="col-md-9">
                <div class="d-flex mt-3">
                    <!--begin::Radio-->
                    <textarea class="form-control form-control-solid" name="speed_contact_address_2" rows="6">{{setting('speed_contact_address_2')}}</textarea>
                    <!--end::Radio-->
                </div>
            </div>
        </div>
        <div class="row fv-row mb-3">
            <div class="col-md-3 text-md-end">
                <!--begin::Label-->
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span>Map Kodu</span>
                    <i class="fas fa-exclamation-circle ms-1 fs-7"></i>
                </label>
                <!--end::Label-->
            </div>
            <div class="col-md-9">
                <div class="d-flex mt-3">
                    <!--begin::Radio-->
                    <textarea class="form-control form-control-solid" name="speed_address_map" rows="11">{{setting('speed_address_map')}}</textarea>
                    <!--end::Radio-->
                </div>
            </div>
        </div>
        <!--begin::Input group-->
        <div class="row">
            <div class="col-md-12 mt-3">
                <!--begin::Button-->
                <button type="submit" class="btn btn-primary w-100">
                    <span class="indicator-label">Kaydet</span>
                </button>
                <!--end::Button-->
            </div>
        </div>
        <!--end::Input group-->
        <!--begin::Action buttons-->
        <!--end::Action buttons-->
    </form>
    <!--end::Form-->
</div>
