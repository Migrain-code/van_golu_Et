<!--begin::Tab pane-->
<div class="tab-pane fade show active" id="kt_ecommerce_add_product_general" role="tab-panel">
    <div class="d-flex flex-column gap-7 gap-lg-10">
        <!--begin::General options-->
        <div class="card card-flush py-4">
            <!--begin::Card header-->
            <div class="card-header">
                <div class="card-title">
                    <h2>Genel</h2>
                </div>
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body pt-0">
                <!--begin::Input group-->
                <div class="mb-10 fv-row">
                    <!--begin::Label-->
                    <label class="required form-label">Ürün Adı</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="text" name="product_name" class="form-control mb-2" placeholder="Ürün Adı" value="" />
                    <!--end::Input-->
                    <!--begin::Description-->
                    <div class="text-muted fs-7">Bir ürün adı gereklidir ve benzersiz olması önerilir. .</div>
                    <!--end::Description-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div>
                    <!--begin::Label-->
                    <label class="form-label">Açıklama</label>
                    <!--end::Label-->
                    <!--begin::Editor-->
                    <div id="kt_ecommerce_add_product_description" name="kt_ecommerce_add_product_description" class="min-h-200px mb-2"></div>
                    <!--end::Editor-->
                    <!--begin::Description-->
                    <div class="text-muted fs-7">Daha iyi görünürlük için ürüne bir açıklama ayarlayın.</div>
                    <!--end::Description-->
                </div>
                <!--end::Input group-->
            </div>
            <!--end::Card header-->
        </div>
        <!--end::General options-->
        <!--begin::Media-->
        <div class="card card-flush py-4">
            <!--begin::Card header-->
            <div class="card-header">
                <div class="card-title">
                    <h2>Ürün Görselleri</h2>
                </div>
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body pt-0">
                <!--begin::Input group-->
                <div class="fv-row mb-2">
                    <!--begin::Dropzone-->
                    <div class="dropzone" onclick="activateFileInput()">
                        <!--begin::Message-->
                        <div class="dz-message">
                            <!--begin::Icon-->
                            <i class="bi bi-file-earmark-arrow-up text-primary fs-3x"></i>
                            <!--end::Icon-->
                            <!--begin::Info-->
                            <div class="ms-4">
                                <h3 class="fs-5 fw-bold text-gray-900 mb-1">Dosyaları buraya bırakın veya yüklemek için tıklayın.</h3>
                                <span class="fs-7 fw-semibold text-gray-400">En fazla 10 dosya yükleyin</span>
                            </div>
                            <!--end::Info-->
                        </div>
                    </div>
                    <!--end::Dropzone-->
                </div>
                <!--end::Input group-->
                <!--begin::Description-->
                <div class="text-muted fs-7">Ürün Galerisini Ayarlayın.</div>
                <!--end::Description-->
            </div>
            <!--end::Card header-->
        </div>
        <!--end::Media-->
        <!--begin::Pricing-->
        <div class="card card-flush py-4">
            <!--begin::Card header-->
            <div class="card-header">
                <div class="card-title">
                    <h2>Fiyatlandırma</h2>
                </div>
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body pt-0">
                <!--begin::Input group-->
                <div class="mb-10 fv-row">
                    <!--begin::Label-->
                    <label class="required form-label">Taban fiyat</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="text" name="price" class="form-control mb-2" placeholder="Ürün Fiyatı" value="" />
                    <!--end::Input-->
                    <!--begin::Description-->
                    <div class="text-muted fs-7">Ürün fiyatını belirleyin.</div>
                    <!--end::Description-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="fv-row mb-10">
                    <!--begin::Label-->
                    <label class="fs-6 fw-semibold mb-2">İndirim Türü
                        <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Ürüne İndirim Hangi Türde Yapılacak"></i></label>
                    <!--End::Label-->
                    <!--begin::Row-->
                    <div class="row row-cols-1 row-cols-md-3 row-cols-lg-1 row-cols-xl-3 g-9" data-kt-buttons="true" data-kt-buttons-target="[data-kt-button='true']">
                        <!--begin::Col-->
                        <div class="col">
                            <!--begin::Option-->
                            <label class="btn btn-outline btn-outline-dashed btn-active-light-primary active d-flex text-start p-6" data-kt-button="true">
                                <!--begin::Radio-->
                                <span class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
                                            <input class="form-check-input" type="radio" name="discount_option" value="1" checked="checked" />
                                        </span>
                                <!--end::Radio-->
                                <!--begin::Info-->
                                <span class="ms-5">
                                            <span class="fs-4 fw-bold text-gray-800 d-block">İndirim Yok</span>
                                        </span>
                                <!--end::Info-->
                            </label>
                            <!--end::Option-->
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col">
                            <!--begin::Option-->
                            <label class="btn btn-outline btn-outline-dashed btn-active-light-primary d-flex text-start p-6" data-kt-button="true">
                                <!--begin::Radio-->
                                <span class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
                                            <input class="form-check-input" type="radio" name="discount_option" value="2" />
                                        </span>
                                <!--end::Radio-->
                                <!--begin::Info-->
                                <span class="ms-5">
                                            <span class="fs-4 fw-bold text-gray-800 d-block">Yüzdelik %</span>
                                        </span>
                                <!--end::Info-->
                            </label>
                            <!--end::Option-->
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col">
                            <!--begin::Option-->
                            <label class="btn btn-outline btn-outline-dashed btn-active-light-primary d-flex text-start p-6" data-kt-button="true">
                                <!--begin::Radio-->
                                <span class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
                                            <input class="form-check-input" type="radio" name="discount_option" value="3" />
                                        </span>
                                <!--end::Radio-->
                                <!--begin::Info-->
                                <span class="ms-5">
                                            <span class="fs-4 fw-bold text-gray-800 d-block">Sabit Fiyat</span>
                                        </span>
                                <!--end::Info-->
                            </label>
                            <!--end::Option-->
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="d-none mb-10 fv-row" id="kt_ecommerce_add_product_discount_percentage">
                    <!--begin::Label-->
                    <label class="form-label">İndirim Yüzdesi</label>
                    <!--end::Label-->
                    <!--begin::Slider-->
                    <div class="d-flex flex-column text-center mb-5">
                        <div class="d-flex align-items-start justify-content-center mb-7">
                            <span class="fw-bold fs-3x" id="kt_ecommerce_add_product_discount_label">0</span>
                            <span class="fw-bold fs-4 mt-1 ms-2">%</span>
                        </div>
                        <div id="kt_ecommerce_add_product_discount_slider" class="noUi-sm"></div>
                    </div>
                    <!--end::Slider-->
                    <!--begin::Description-->
                    <div class="text-muted fs-7">Bu ürüne uygulanacak yüzde indirimi ayarlayın.</div>
                    <!--end::Description-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="d-none mb-10 fv-row" id="kt_ecommerce_add_product_discount_fixed">
                    <!--begin::Label-->
                    <label class="form-label">Sabit İndirimli Fiyat</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="text" name="discounted_price" class="form-control mb-2" placeholder="Kaç Tl indirim uygulanacak" />
                    <!--end::Input-->
                    <!--begin::Description-->
                    <div class="text-muted fs-7">İndirimli ürün fiyatını ayarlayın. Ürün belirlenen sabit fiyattan indirilecektir</div>
                    <!--end::Description-->
                </div>
                <!--end::Input group-->
                <!--begin::Tax-->
                <div class="d-flex flex-wrap gap-5">
                    <!--begin::Input group-->
                    <div class="fv-row w-100 flex-md-root">
                        <!--begin::Label-->
                        <label class="required form-label">Vergi Sınıfı</label>
                        <!--end::Label-->
                        <!--begin::Select2-->
                        <select class="form-select mb-2" name="tax" data-control="select2" data-hide-search="true" data-placeholder="Bir seçenek belirleyin">
                            <option></option>
                            <option value="0">Vergisiz</option>
                            <option value="1">Vergiye Tabi</option>
                            <option value="2">İndirilebilir Ürün</option>
                        </select>
                        <!--end::Select2-->
                        <!--begin::Description-->
                        <div class="text-muted fs-7">Ürün vergisi sınıfını ayarlayın.</div>
                        <!--end::Description-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row w-100 flex-md-root">
                        <!--begin::Label-->
                        <label class="form-label">KDV Tutarı (%)</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="text" class="form-control mb-2" name="kdv" value="" />
                        <!--end::Input-->
                        <!--begin::Description-->
                        <div class="text-muted fs-7">Ürün KDV'sini ayarlayın.</div>
                        <!--end::Description-->
                    </div>
                    <!--end::Input group-->
                </div>
                <!--end:Tax-->
            </div>
            <!--end::Card header-->
        </div>
        <!--end::Pricing-->
    </div>
</div>
<!--end::Tab pane-->
