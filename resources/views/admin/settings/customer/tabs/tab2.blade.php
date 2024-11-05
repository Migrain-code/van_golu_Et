<div class="tab-pane fade" id="kt_ecommerce_settings_products" role="tabpanel">
    <!--begin::Form-->
    <form enctype="multipart/form-data"  class="form" action="{{route('admin.settings.update')}}" method="post">
        @csrf
        <!--begin::Heading-->
        <div class="row mb-3">
            <div class="col-md-9 offset-md-3">
                <h2>Anasayfa Görüntüleme Ayarları</h2>
            </div>
        </div>
        <!--end::Heading-->
        <!--begin::Input group-->
        <div class="row fv-row mb-3">
            <div class="col-md-3 text-md-end">
                <!--begin::Label-->
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span>1. Bölüm</span>
                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Enable/disable review entries for registered customers"></i>
                </label>
                <!--end::Label-->
            </div>
            <div class="col-md-9">
                <div class="d-flex mt-3">
                    <!--begin::Radio-->
                    <div class="form-check form-check-custom form-check-solid me-5">
                        <input class="form-check-input" type="radio" value="1" @checked(setting('speed_main_page_section_1')=="1") name="speed_main_page_section_1" id="allow_reviews_yes" checked="checked" />
                        <label class="form-check-label" for="allow_reviews_yes">Göster</label>
                    </div>
                    <div class="form-check form-check-custom form-check-solid">
                        <input class="form-check-input" type="radio" value="0" @checked(setting('speed_main_page_section_1')=="0") name="speed_main_page_section_1" id="allow_reviews_no" />
                        <label class="form-check-label" for="allow_reviews_no">Gösterme</label>
                    </div>
                    <!--end::Radio-->
                </div>
            </div>
        </div>
        <div class="row fv-row mb-3">
            <div class="col-md-3 text-md-end">
                <!--begin::Label-->
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span>2. Bölüm</span>
                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Enable/disable review entries for registered customers"></i>
                </label>
                <!--end::Label-->
            </div>
            <div class="col-md-9">
                <div class="d-flex mt-3">
                    <!--begin::Radio-->
                    <div class="form-check form-check-custom form-check-solid me-5">
                        <input class="form-check-input" type="radio" value="1" @checked(setting('speed_main_page_section_2')=="1") name="speed_main_page_section_2" id="allow_reviews_yes" checked="checked" />
                        <label class="form-check-label" for="allow_reviews_yes">Göster</label>
                    </div>
                    <div class="form-check form-check-custom form-check-solid">
                        <input class="form-check-input" type="radio" value="0" @checked(setting('speed_main_page_section_2')=="0") name="speed_main_page_section_2" id="allow_reviews_no" />
                        <label class="form-check-label" for="allow_reviews_no">Gösterme</label>
                    </div>
                    <!--end::Radio-->
                </div>
            </div>
        </div>
        <div class="row fv-row mb-3">
            <div class="col-md-3 text-md-end">
                <!--begin::Label-->
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span>3. Bölüm</span>
                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Enable/disable review entries for registered customers"></i>
                </label>
                <!--end::Label-->
            </div>
            <div class="col-md-9">
                <div class="d-flex mt-3">
                    <!--begin::Radio-->
                    <div class="form-check form-check-custom form-check-solid me-5">
                        <input class="form-check-input" type="radio" value="1" @checked(setting('speed_main_page_section_3')=="1") name="speed_main_page_section_3" id="allow_reviews_yes" checked="checked" />
                        <label class="form-check-label" for="allow_reviews_yes">Göster</label>
                    </div>
                    <div class="form-check form-check-custom form-check-solid">
                        <input class="form-check-input" type="radio" value="0" @checked(setting('speed_main_page_section_3')=="0") name="speed_main_page_section_3" id="allow_reviews_no" />
                        <label class="form-check-label" for="allow_reviews_no">Gösterme</label>
                    </div>
                    <!--end::Radio-->
                </div>
            </div>
        </div>
        <div class="row fv-row mb-3">
            <div class="col-md-3 text-md-end">
                <!--begin::Label-->
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span>4. Bölüm</span>
                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Enable/disable review entries for registered customers"></i>
                </label>
                <!--end::Label-->
            </div>
            <div class="col-md-9">
                <div class="d-flex mt-3">
                    <!--begin::Radio-->
                    <div class="form-check form-check-custom form-check-solid me-5">
                        <input class="form-check-input" type="radio" value="1" @checked(setting('speed_main_page_section_4')=="1") name="speed_main_page_section_4" id="allow_reviews_yes" checked="checked" />
                        <label class="form-check-label" for="allow_reviews_yes">Göster</label>
                    </div>
                    <div class="form-check form-check-custom form-check-solid">
                        <input class="form-check-input" type="radio" value="0" @checked(setting('speed_main_page_section_4')=="0") name="speed_main_page_section_4" id="allow_reviews_no" />
                        <label class="form-check-label" for="allow_reviews_no">Gösterme</label>
                    </div>
                    <!--end::Radio-->
                </div>
            </div>
        </div>
        <div class="row fv-row mb-3">
            <div class="col-md-3 text-md-end">
                <!--begin::Label-->
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span>5. Bölüm</span>
                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Enable/disable review entries for registered customers"></i>
                </label>
                <!--end::Label-->
            </div>
            <div class="col-md-9">
                <div class="d-flex mt-3">
                    <!--begin::Radio-->
                    <div class="form-check form-check-custom form-check-solid me-5">
                        <input class="form-check-input" type="radio" value="1" @checked(setting('speed_main_page_section_5')=="1") name="speed_main_page_section_5" id="allow_reviews_yes" checked="checked" />
                        <label class="form-check-label" for="allow_reviews_yes">Göster</label>
                    </div>
                    <div class="form-check form-check-custom form-check-solid">
                        <input class="form-check-input" type="radio" value="0" @checked(setting('speed_main_page_section_5')=="0") name="speed_main_page_section_5" id="allow_reviews_no" />
                        <label class="form-check-label" for="allow_reviews_no">Gösterme</label>
                    </div>
                    <!--end::Radio-->
                </div>
            </div>
        </div>
        <div class="row fv-row mb-3">
            <div class="col-md-3 text-md-end">
                <!--begin::Label-->
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span>6. Bölüm</span>
                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Enable/disable review entries for registered customers"></i>
                </label>
                <!--end::Label-->
            </div>
            <div class="col-md-9">
                <div class="d-flex mt-3">
                    <!--begin::Radio-->
                    <div class="form-check form-check-custom form-check-solid me-5">
                        <input class="form-check-input" type="radio" value="1" @checked(setting('speed_main_page_section_6')=="1") name="speed_main_page_section_6" id="allow_reviews_yes" checked="checked" />
                        <label class="form-check-label" for="allow_reviews_yes">Göster</label>
                    </div>
                    <div class="form-check form-check-custom form-check-solid">
                        <input class="form-check-input" type="radio" value="0" @checked(setting('speed_main_page_section_6')=="0") name="speed_main_page_section_6" id="allow_reviews_no" />
                        <label class="form-check-label" for="allow_reviews_no">Gösterme</label>
                    </div>
                    <!--end::Radio-->
                </div>
            </div>
        </div>
        <div class="row py-5">
            <div class="col-md-9 offset-md-3">
                <div class="d-flex">
                    <!--begin::Button-->
                    <button type="submit" class="btn btn-primary">
                        <span class="indicator-label">Save</span>
                    </button>
                    <!--end::Button-->
                </div>
            </div>
        </div>
        <!--end::Action buttons-->
    </form>
    <!--end::Form-->
</div>
