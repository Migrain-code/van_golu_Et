<!--begin::Modal - Customers - Add-->
<div class="modal fade" id="kt_modal_add_customer" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Form-->
            <form class="form" action="#" id="kt_modal_add_customer_form" enctype="multipart/form-data" data-kt-redirect="">
                <!--begin::Modal header-->
                <div class="modal-header" id="kt_modal_add_customer_header">
                    <!--begin::Modal title-->
                    <h2 class="fw-bold">Hizmet Ekle</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div id="kt_modal_add_customer_close" class="btn btn-icon btn-sm btn-active-icon-primary">
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
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <div class="form-group fv-row my-2">
                            <label class="col-form-label fw-semibold fs-6">
                                <span class="required">Hizmet Kategorisi</span>
                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Hizmet Kategorisi vereceği hizmeti temsil eden kategoridir"></i>
                            </label>
                            <div class="fv-row">
                                <select name="category_id" aria-label="Hizmet Kategorisi Seçiniz" data-placeholder="Hizmet Kategorisi Seçiniz..." data-dropdown-parent="#kt_modal_add_customer" data-control="select2"  class="form-select form-select-solid form-select-lg fw-semibold">
                                    <option value="">Hizmet Kategorisi Seçiniz...</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->getName()}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group fv-row my-2">
                            <label class="col-form-label fw-semibold fs-6">
                                <span class="required">Hizmet Seçiniz</span>
                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Hizmet Kategorisi vereceği hizmeti temsil eden kategoridir"></i>
                            </label>
                            <div class="fv-row">
                                <select name="sub_category_id" aria-label="Hizmet Seçiniz" data-placeholder="Hizmet Seçiniz..." data-dropdown-parent="#kt_modal_add_customer" data-control="select2"  class="form-select form-select-solid form-select-lg fw-semibold">
                                    <option value="">Hizmet Seçiniz...</option>

                                </select>
                            </div>
                        </div>

                        <div class="form-group fv-row my-2">
                            <label class="col-form-label fw-semibold fs-6">
                                <span class="required">Hizmet Cinsiyeti</span>
                                <i class="fas fa-exclamation-circle ms-1 fs-7"
                                   data-bs-toggle="tooltip"
                                   title="İşletmenizin hizmer verdiği tür kadın ise sadece
                                   kadınlara hizmet seçeneği verir erkek ise aynı şekilde
                                   ama iki cinsiyete hizmet veriyorsanız her iki cinsiyete
                                   istediğiniz türden ekleyebilirsiniz.
                                   Eğer kadın erkek seçeneğiniz seçerseniz seçtiğini hizmet her iki cinsiyette de eklenir"></i>
                            </label>
                            <div class="fv-row">
                                <select name="gender" aria-label="Cinsiyet Seçiniz" data-placeholder="Cinsiyet Seçiniz..." data-dropdown-parent="#kt_modal_add_customer" data-control="select2"  class="form-select form-select-solid form-select-lg fw-semibold">
                                    <option value="">Cinsiyet Seçiniz...</option>
                                    @if($business->type_id == 3)
                                        @foreach($businessTypes as $type)
                                                <option value="{{$type->id}}" @selected($business->type_id == $type->id)>{{$type->name}}</option>
                                        @endforeach
                                    @else
                                        <option value="{{$business->type->id}}" selected>{{$business->type->name}}</option>
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="form-group fv-row my-2">
                            <label class="col-form-label fw-semibold fs-6">
                                <span class="required">Hizmet Fiyatı</span>
                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Randevularınızda Hizmete Ödenecek Ücreti Temsil Eder"></i>
                            </label>
                            <input name="price" class="form-control form-control-lg form-control-solid" value="" />

                        </div>
                        <div class="form-group fv-row my-2">
                            <label class="col-form-label fw-semibold fs-6">
                                <span class="required">Süre</span>
                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Bu Hizmet Kaç Dakika Sürecek. Randevu aldığınızda bu hizmet seçilirse hizmetin süresi randevu aralığına eklenir"></i>
                            </label>
                            <div class="fv-row">
                                <select name="time" aria-label="Süre Seçiniz" data-placeholder="Süre Seçiniz..." data-dropdown-parent="#kt_modal_add_customer" data-control="select2"  class="form-select form-select-solid form-select-lg fw-semibold">
                                    <option value="">Süre Seçiniz...</option>
                                    @for($i = 5; $i <= 120; $i+=5)
                                        <option value="{{$i}}">{{$i. " Dakika"}}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <input type="hidden" name="business_id" value="{{$business->id}}">

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
            <!--end::Form-->
        </div>
    </div>
</div>
<!--end::Modal - Customers - Add-->
