<div class="tab-pane fade" id="kt_ecommerce_settings_products" role="tabpanel">
    <!--begin::Form-->
    <form enctype="multipart/form-data"  class="form" action="{{route('admin.settings.update')}}" method="post">
        @csrf
        <!--begin::Input group-->
        <div class="modal-body py-5 px-lg-17">
            <!--begin::Scroll-->
            <!--begin::Input group-->
            <div class="fv-row mb-7">
                <!--begin::Label-->
                <label class="fs-2hx fw-semibold mb-2">Misyon ve Vizyon Metinleri</label>
                <!--end::Label-->
            </div>

            @foreach($languages as $language)
                <div class="fv-row mb-7">
                    <!--begin::Label-->
                    <label class="required fs-6 fw-semibold mb-2">Misyon Metni ({{$language->name}})</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <textarea type="text" class="form-control form-control-solid" rows="3" placeholder="" name="about_mission_{{$language->code}}_text">{{setting('about_mission_'.$language->code.'_text')}}</textarea>
                    <!--end::Input-->
                </div>
                @if($loop->last)
                    <hr>
                @endif
            @endforeach
            @foreach($languages as $language)
                <div class="fv-row mb-7">
                    <!--begin::Label-->
                    <label class="required fs-6 fw-semibold mb-2">Vizyon Metni ({{$language->name}})</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <textarea type="text" class="form-control form-control-solid" rows="3" placeholder="" name="about_vission_{{$language->code}}_text">{{setting('about_vission_'.$language->code.'_text')}}</textarea>
                    <!--end::Input-->
                </div>
                @if($loop->last)
                    <hr>
                @endif
            @endforeach
            <!--end::Scroll-->
        </div>

        <div class="row py-5">
            <div class="col-12">
                <div class="d-flex">
                    <!--begin::Button-->
                    <button type="submit" class="btn btn-primary w-100">
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
