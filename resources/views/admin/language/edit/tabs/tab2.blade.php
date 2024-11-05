<div class="tab-pane fade  show active" id="kt_tab_pane_2" role="tabpanel">
    @foreach($language->translations as $key => $value)

        <div class="row">
            <div class="fv-row mb-7 col-6">
                <!--begin::Label-->
                <label class="required fs-6 fw-semibold mb-2">Anahtar</label>
                <!--end::Label-->
                <!--begin::Input-->
                <input type="text" class="form-control form-control-solid" placeholder="Örn: tr" name="keys[]" value="{{ $key }}" />
                <!--end::Input-->
            </div>
            <div class="fv-row mb-7 col-6">
                <!--begin::Label-->
                <label class="required fs-6 fw-semibold mb-2">Değer</label>
                <!--end::Label-->
                <!--begin::Input-->
                <input type="text" class="form-control form-control-solid" placeholder="Örn: tr" name="values[]" value="{{ $value }}" />
                <!--end::Input-->
            </div>
        </div>
    @endforeach
        <!--begin::Repeater-->
        <div id="kt_docs_repeater_basic">
            <!--begin::Form group-->
            <div class="form-group">
                <div data-repeater-list="kt_docs_repeater_basic">
                    <div data-repeater-item>
                        <div class="form-group row">
                            <div class="col-md-5">
                                <label class="form-label">Anahtar Kelime:</label>
                                <input type="text" class="form-control mb-2 mb-md-0" name="keys" placeholder="Örn. Contact" />
                            </div>
                            <div class="col-md-5">
                                <label class="form-label">Değer:</label>
                                <input type="text" class="form-control mb-2 mb-md-0" name="values" placeholder="Örn. İletişim" />
                            </div>
                            <div class="col-md-2">
                                <a href="javascript:;" data-repeater-delete class="btn btn-sm btn-light-danger mt-3 mt-md-8">
                                    <i class="fa fa-trash fs-5"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Form group-->

            <!--begin::Form group-->
            <div class="form-group mt-5">
                <a href="javascript:;" data-repeater-create class="btn btn-light-primary">
                    <i class="ki-duotone ki-plus fs-3"></i>
                    Ekle
                </a>
            </div>
            <!--end::Form group-->
        </div>
        <!--end::Repeater-->
</div>
