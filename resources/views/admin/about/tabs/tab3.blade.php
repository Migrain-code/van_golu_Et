<div class="tab-pane fade" id="kt_ecommerce_settings_contact" role="tabpanel">
    <!--begin::Form-->
    <form method="post" class="form" action="{{route('admin.settings.update')}}" enctype="multipart/form-data">
        @csrf
        <!--begin::Heading-->
        <div class="row my-3">
            <div class="col-9">
                <h2>Hakkımızda Sayfası Seo Ayarları</h2>
            </div>
        </div>
        @foreach($languages as $language)
            <!--end::Heading-->
            <div class="fv-row mb-7">
                <!--begin::Label-->
                <label class="required fs-6 fw-semibold mb-2">Seo Başlık ({{$language->name}})</label>
                <!--end::Label-->
                <!--begin::Input-->
                <input type="text" class="form-control form-control-solid" placeholder="" name="about_meta_title_{{$language->code}}_text" value="{{setting('about_meta_title_'.$language->code.'_text')}}" />
                <!--end::Input-->
            </div>
            <!--end::Input group-->
            <div class="fv-row mb-7">
                <!--begin::Label-->
                <label class="required fs-6 fw-semibold mb-2">Seo Açıklama ({{$language->name}})</label>
                <!--end::Label-->
                <!--begin::Input-->
                <input type="text" class="form-control form-control-solid" placeholder="" name="about_meta_description{{$language->code}}_text" value="{{setting('about_meta_description'.$language->code.'_text')}}" />
                <!--end::Input-->
            </div>

            <hr>
            <!--begin::Input group-->
        @endforeach


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
