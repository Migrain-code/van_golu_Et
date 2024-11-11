<div class="tab-pane fade show active" id="kt_ecommerce_settings_general" role="tabpanel">
    <form enctype="multipart/form-data" class="form" action="{{route('admin.settings.update')}}" method="post">
        @csrf
        <!--begin::Modal body-->
        <div class="modal-body py-5 px-lg-17">
            <!--begin::Scroll-->
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
                    <input type="text" class="form-control form-control-solid" placeholder="" name="speed_meta_descriptions" value="{{setting('speed_meta_descriptions')}}" />
                    <!--end::Input-->
                </div>
                <!--end::Input group-->
                <div class="fv-row mb-7">
                    <!--begin::Label-->
                    <label class="required fs-6 fw-semibold mb-2">Logo (322 * 83)</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="file" class="form-control form-control-solid" placeholder="" name="logo" value="" />
                    <!--end::Input-->
                    <div class="imgBox bg-dark">
                        <img src="{{image(setting('logo'))}}" class="p-3">
                    </div>
                </div>

                <div class="fv-row mb-7">
                    <!--begin::Label-->
                    <label class="required fs-6 fw-semibold mb-2">Favicon (50 * 50)</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="file" class="form-control form-control-solid" placeholder="" name="favicon" value="" />
                    <!--end::Input-->
                    <div class="imgBox bg-dark">
                        <img src="{{image(setting('favicon'))}}" class="p-3" style="width: 50px; height: 50px">
                    </div>
                </div>

                <div class="fv-row mb-7">
                    <!--begin::Label-->
                    <label class="required fs-6 fw-semibold mb-2">Video Kapak Görseli (1260 × 500) <a href="{{image(setting('main_page_video_cover_image'))}}" target="_blank">Görüntüle</a></label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="file" class="form-control form-control-solid" placeholder="" name="main_page_video_cover_image" value="" />
                    <!--end::Input-->
                    <img src="{{image(setting('main_page_video_cover_image'))}}" style="width: 250px; height: 100px">
                </div>
                <div class="fv-row mb-7">
                    <!--begin::Label-->
                    <label class="required fs-6 fw-semibold mb-2">Video Linki</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="text" class="form-control form-control-solid" placeholder="örn. https://www.youtube.com/watch?v=W-j4QGAgNu8" name="main_page_video_link" value="{{setting('main_page_video_link')}}" />
                    <!--end::Input-->
                </div>
                <!--end::Input group-->

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
