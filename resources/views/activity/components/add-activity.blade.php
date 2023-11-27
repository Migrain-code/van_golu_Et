<!--begin::Modal - Customers - Add-->
<div class="modal fade" id="kt_modal_add_activity" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Form-->
            <form class="form" action="#" id="kt_modal_add_activity_form" enctype="multipart/form-data" data-kt-redirect="">
                <!--begin::Modal header-->
                <div class="modal-header" id="kt_modal_add_activity_header">
                    <!--begin::Modal title-->
                    <h2 class="fw-bold">Etkinlik Oluştur</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div id="kt_modal_add_activity_close" class="btn btn-icon btn-sm btn-active-icon-primary">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                        <span class="svg-icon svg-icon-1">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
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
                    <div class="scroll-y me-n7 pe-7" id="kt_modal_add_activity_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_activity_header" data-kt-scroll-wrappers="#kt_modal_add_activity_scroll" data-kt-scroll-offset="300px">

                        <!--begin::Input group-->
                        <ul class="nav nav-tabs nav-line-tabs mb-5 fs-6">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#kt_tab_pane_1">Başlıklar</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#kt_tab_pane_2">Açıklamalar</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#kt_tab_pane_3">Görseller</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#kt_tab_pane_4">Yer ve Zaman</a>
                            </li>
                        </ul>

                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="kt_tab_pane_1" role="tabpanel">
                                <div class="fv-row mb-7">
                                    <!--begin::Label-->
                                    <label class="required fs-6 fw-semibold mb-2">Başlık (Türkçe)</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" class="form-control form-control-solid" placeholder="" name="title[tr]" value="" />
                                    <!--end::Input-->
                                </div>
                                <div class="fv-row mb-7">
                                    <!--begin::Label-->
                                    <label class="required fs-6 fw-semibold mb-2">Başlık (İngilizce)</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" class="form-control form-control-solid" placeholder="" name="title[en]" value="" />
                                    <!--end::Input-->
                                </div>
                                <div class="fv-row mb-7">
                                    <!--begin::Label-->
                                    <label class="required fs-6 fw-semibold mb-2">Başlık (Almanca)</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" class="form-control form-control-solid" placeholder="" name="title[de]" value="" />
                                    <!--end::Input-->
                                </div>

                                <div class="fv-row mb-7">
                                    <!--begin::Label-->
                                    <label class="required fs-6 fw-semibold mb-2">Başlık (İspanyolca)</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" class="form-control form-control-solid" placeholder="" name="title[es]" value="" />
                                    <!--end::Input-->
                                </div>

                                <div class="fv-row mb-7">
                                    <!--begin::Label-->
                                    <label class="required fs-6 fw-semibold mb-2">Başlık (Fransızca)</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" class="form-control form-control-solid" placeholder="" name="title[fr]" value="" />
                                    <!--end::Input-->
                                </div>

                                <div class="fv-row mb-7">
                                    <!--begin::Label-->
                                    <label class="required fs-6 fw-semibold mb-2">Başlık (İtalyanca)</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" class="form-control form-control-solid" placeholder="" name="title[it]" value="" />
                                    <!--end::Input-->
                                </div>
                            </div>
                            <div class="tab-pane fade" id="kt_tab_pane_2" role="tabpanel">
                                <div class="fv-row mb-7">
                                    <!--begin::Label-->
                                    <label class="required fs-6 fw-semibold mb-2">Açıklama (Türkçe)</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <textarea name="description[tr]" class="kt_docs_ckeditor_classic" id="kt_docs_ckeditor_classic_tr"></textarea>
                                    <!--end::Input-->
                                </div>
                                <div class="fv-row mb-7">
                                    <!--begin::Label-->
                                    <label class="required fs-6 fw-semibold mb-2">Açıklama (İngilizce)</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <textarea name="description[en]" class="kt_docs_ckeditor_classic" id="kt_docs_ckeditor_classic_en"></textarea>
                                    <!--end::Input-->
                                </div>
                                <div class="fv-row mb-7">
                                    <!--begin::Label-->
                                    <label class="required fs-6 fw-semibold mb-2">Açıklama (Almanca)</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <textarea name="description[de]" class="kt_docs_ckeditor_classic" id="kt_docs_ckeditor_classic_de"></textarea>
                                    <!--end::Input-->
                                </div>
                                <div class="fv-row mb-7">
                                    <!--begin::Label-->
                                    <label class="required fs-6 fw-semibold mb-2">Açıklama (İspanyolca)</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <textarea name="description[es]" class="kt_docs_ckeditor_classic" id="kt_docs_ckeditor_classic_es"></textarea>
                                    <!--end::Input-->
                                </div>
                                <div class="fv-row mb-7">
                                    <!--begin::Label-->
                                    <label class="required fs-6 fw-semibold mb-2">Açıklama (Fransızca)</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <textarea name="description[fr]" class="kt_docs_ckeditor_classic" id="kt_docs_ckeditor_classic_fr"></textarea>
                                    <!--end::Input-->
                                </div>
                                <div class="fv-row mb-7">
                                    <!--begin::Label-->
                                    <label class="required fs-6 fw-semibold mb-2">Açıklama (İtalyanca)</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <textarea name="description[it]" class="kt_docs_ckeditor_classic" id="kt_docs_ckeditor_classic_it"></textarea>

                                    <!--end::Input-->
                                </div>
                            </div>

                            <div class="tab-pane fade" id="kt_tab_pane_3" role="tabpanel">
                                <div class="fv-row mb-7">
                                    <label for="activity_gallery" class="drop-container">
                                        <div class="drop-title mb-3">Galeri Görselleri</div>
                                        <div class="custom-file-input">
                                            <span class="file-label"><span class="file-count">Görseli Buraya Sürükle veya seç</span></span>
                                            <input type="file" multiple name="activity_gallery" accept=".png, .jpg, .jpeg" id="activity_gallery" onchange="updateFileCount(this)">
                                        </div>
                                    </label>
                                </div>
                                <div class="fv-row mb-7">
                                    <label for="activity_slider" class="drop-container">
                                        <div class="drop-title mb-3">Slider Görselleri</div>
                                        <div class="custom-file-input">
                                            <span class="file-label"><span class="file-count">Görseli Buraya Sürükle veya seç</span></span>
                                            <input type="file" multiple name="activity_slider" accept=".png, .jpg, .jpeg" id="activity_slider" onchange="updateFileCount(this)">
                                        </div>
                                    </label>
                                </div>

                            </div>
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
                                    <input type="text" class="form-control form-control-solid" placeholder="" name="phone" value="" />
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
                                    <input type="text" class="form-control form-control-solid" placeholder="" name="hotel_name" value="" />
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
                                    <textarea type="text" class="form-control form-control-solid" rows="7" placeholder="" name="embed_code"></textarea>
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
                                            <option value="{{$city->id}}">{{$city->name}}</option>
                                        @endforeach
                                    </select>
                                    <!--end::Input-->
                                </div>

                            </div>
                        </div>


                    </div>
                    <!--end::Scroll-->
                </div>
                <!--end::Modal body-->
                <!--begin::Modal footer-->
                <div class="modal-footer flex-center">
                    <!--begin::Button-->
                    <button type="reset" id="kt_modal_add_activity_cancel" class="btn btn-light me-3">Discard</button>
                    <!--end::Button-->
                    <!--begin::Button-->
                    <button type="submit" id="kt_modal_add_activity_submit" class="btn btn-primary">
                        <span class="indicator-label">Submit</span>
                        <span class="indicator-progress">Please wait...
															<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                    <!--end::Button-->
                </div>
                <!--end::Modal footer-->
            </form>
            <!--end::Form-->
        </div>
    </div>
</div>
<!--end::Modal - Customers - Add-->
