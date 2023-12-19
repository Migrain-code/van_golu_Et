@extends('layouts.master')
@section('title', 'İşletme Ayarları')
@section('styles')

@endsection
@section('content')
    <div id="kt_app_content_container" class="app-container container-xxl">
        @include('business.detail.layouts.header')
        <!--begin::details View-->
        <div class="card mb-5 mb-xl-10">
            <!--begin::Card header-->
            <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
                <!--begin::Card title-->
                <div class="card-title m-0">
                    <h3 class="fw-bold m-0">İşletme Ayarları</h3>
                </div>
                <!--end::Card title-->
            </div>
            <!--begin::Card header-->
            <!--begin::Content-->
            <div id="kt_account_settings_profile_details" class="collapse show">
                <!--begin::Form-->
                <form id="kt_account_profile_details_form" method="post" action="{{route('admin.business.update', $business->id)}}" class="form" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <!--begin::Card body-->
                    <div class="card-body border-top p-9">
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label fw-semibold fs-6">Avatar</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8">
                                <!--begin::Image input-->
                                <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('../assets/media/svg/avatars/blank.svg')">
                                    <!--begin::Preview existing avatar-->
                                    <div class="image-input-wrapper w-125px h-125px" style="background-image: url('{{substr($business->logo, 0 ,1) == "s" ? image($business->logo) : '/assets/media/svg/avatars/blank.svg'}}')"></div>
                                    <!--end::Preview existing avatar-->
                                    <!--begin::Label-->
                                    <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                        <i class="bi bi-pencil-fill fs-7"></i>
                                        <!--begin::Inputs-->
                                        <input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
                                        <input type="hidden" name="avatar_remove" />
                                        <!--end::Inputs-->
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Cancel-->
                                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
																	<i class="bi bi-x fs-2"></i>
																</span>
                                    <!--end::Cancel-->
                                    <!--begin::Remove-->
                                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
																	<i class="bi bi-x fs-2"></i>
																</span>
                                    <!--end::Remove-->
                                </div>
                                <!--end::Image input-->
                                <!--begin::Hint-->
                                <div class="form-text">İzin verilen dosya tipleri: png, jpg, jpeg.</div>
                                <!--end::Hint-->
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Full Name</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8">
                                <!--begin::Row-->
                                <div class="row">
                                    <!--begin::Col-->
                                    <div class="col-lg-12 fv-row">
                                        <input type="text" name="name" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="İşletme Adı" value="{{$business->name}}" />
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Row-->
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">E-mail</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <input type="text" name="business_email" class="form-control form-control-lg form-control-solid" placeholder="İşletme E-posta" value="{{$business->business_email}}" />
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                <span class="required">İşletme Telefon</span>
                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Phone number must be active"></i>
                            </label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <input type="tel" name="phone" class="form-control form-control-lg form-control-solid" placeholder="Phone number" value="{{$business->phone}}" />
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label fw-semibold fs-6">İşletme Türü</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <select name="business_type" aria-label="İşletme Türü Seçiniz" data-control="select2" data-placeholder="İşletme Türü Seçiniz..." class="form-select form-select-solid form-select-lg fw-semibold">
                                    @foreach($businessTypes as $type)
                                        <option value="{{$type->id}}" @selected($business->type_id == $type->id)>{{$type->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                <span class="required">Şehir</span>
                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="İşletmenin Bulunduğu Şehri Seçiniz"></i>
                            </label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <select name="city_id" aria-label="Şehir Seçiniz" data-control="select2" data-placeholder="Şehir Seçiniz..." class="form-select form-select-solid form-select-lg fw-semibold">
                                    <option value="">Şehir Seçiniz...</option>
                                    @foreach($cities as $city)
                                        <option value="{{$city->id}}" @selected($city->id == $business->city)>{{$city->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                <span class="required">İlçe</span>
                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="İşletmenin Bulunduğu Şehri Seçiniz"></i>
                            </label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <select name="district_id" aria-label="İlçe Seçiniz" data-control="select2" data-placeholder="İlçe Seçiniz..." class="form-select form-select-solid form-select-lg fw-semibold">
                                    <option value="">İlçe Seçiniz...</option>
                                    @foreach($business->cities->districts as $district)
                                        <option value="{{$district->id}}" @selected($district->id == $business->district)>{{$district->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                <span class="required">Tatil Günü</span>
                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="İşletmenin Bulunduğu Şehri Seçiniz"></i>
                            </label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <select name="off_day" aria-label="Tatil Günü Seçiniz" data-control="select2" data-placeholder="Tatil Günü Seçiniz..." class="form-select form-select-solid form-select-lg fw-semibold">
                                    <option value="">Tatil Günü Seçiniz...</option>
                                    @foreach($dayList as $day)
                                        <option value="{{$day->id}}" @selected($day->id == $business->off_day)>{{$day->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                <span class="required">Randevu Aralığı</span>
                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="İşletmenin Bulunduğu Şehri Seçiniz"></i>
                            </label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <select name="appointment_range" aria-label="Randevu Aralığı Seçiniz" data-control="select2" data-placeholder="Randevu Aralığı Seçiniz..." class="form-select form-select-solid form-select-lg fw-semibold">
                                    <option value="">Randevu Aralığı Seçiniz...</option>
                                    @foreach($appointmentRanges as $range)
                                        <option value="{{$range->id}}" @selected($range->id == $business->appoinment_range)>{{$range->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!--end::Col-->
                        </div>
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                <span class="required">Onay Yürü</span>
                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="İşletmenin Bulunduğu Şehri Seçiniz"></i>
                            </label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <select name="approve_type" aria-label="Onay Türü Seçiniz" data-control="select2" data-placeholder="Onay Türü Seçiniz..." class="form-select form-select-solid form-select-lg fw-semibold">
                                    <option value="">Onay Türü Seçiniz...</option>
                                    <option value="0" @selected($business->approve_type == 0)> Otomatik Onay </option>
                                    <option value="1" @selected($business->approve_type == 1)> Manuel Onay</option>
                                </select>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label fw-semibold fs-6">Açılış Saati</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <input name="start_time" class="form-control form-control-lg form-control-solid timeSelector" value="{{$business->start_time}}" />
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label fw-semibold fs-6">Kapanış Saati</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <input name="end_time" class="form-control form-control-lg form-control-solid timeSelector" value="{{$business->end_time}}" />
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label fw-semibold fs-6">Kuruluş Yılı</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <input name="year" class="form-control form-control-lg form-control-solid timeSelector2" value="{{$business->year}}" />
                            </div>
                            <!--end::Col-->
                        </div>
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label fw-semibold fs-6">Personel Sayısı
                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Provide your team size to help us setup your billing"></i></label>
                            <!--end::Label-->
                            <div class="col-lg-8 f-row">
                                <!--begin::Row-->
                                <div class="row mb-2" data-kt-buttons="true">
                                    <!--begin::Col-->
                                    <div class="col">

                                        <!--begin::Option-->
                                        <label class="btn btn-outline btn-outline-dashed btn-active-light-primary w-100 p-4 @if($business->personal_count == "1-1") active @endif">
                                            <input type="radio" class="btn-check" name="personal_count" @checked($business->personal_count == "1-1") value="1-1" />
                                            <span class="fw-bold fs-3">1-1</span>
                                        </label>
                                        <!--end::Option-->
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col">
                                        <!--begin::Option-->
                                        <label class="btn btn-outline btn-outline-dashed btn-active-light-primary w-100 p-4 @if($business->personal_count == "2-10") active @endif">
                                            <input type="radio" class="btn-check" name="personal_count" @checked($business->personal_count == "2-10") value="2-10" />
                                            <span class="fw-bold fs-3">2-10</span>
                                        </label>
                                        <!--end::Option-->
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col">
                                        <!--begin::Option-->
                                        <label class="btn btn-outline btn-outline-dashed btn-active-light-primary w-100 p-4 @if($business->personal_count == "10-50") active @endif">
                                            <input type="radio" class="btn-check" name="personal_count" @checked($business->personal_count == "10-50") value="10-50" />
                                            <span class="fw-bold fs-3">10-50</span>
                                        </label>
                                        <!--end::Option-->
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col">
                                        <!--begin::Option-->
                                        <label class="btn btn-outline btn-outline-dashed btn-active-light-primary w-100 p-4 @if($business->personal_count == "50+") active @endif">
                                            <input type="radio" class="btn-check" name="personal_count" @checked($business->personal_count == "50+") value="50+" />
                                            <span class="fw-bold fs-3">50+</span>
                                        </label>
                                        <!--end::Option-->
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Row-->
                                <!--begin::Hint-->
                                <div class="form-text">İşletmenize kaç adet personel tanımlaması yapcaksanız ona göre sayı seçimi yapınız</div>
                                <!--end::Hint-->
                            </div>
                        </div>
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label fw-semibold fs-6">Adress</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <textarea name="address"
                                          class="form-control form-control-lg form-control-solid"
                                          rows="5"
                                          placeholder="İşletme Adresi">{{$business->address}}</textarea>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">İletişim Tercihleri</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <!--begin::Options-->
                                <div class="d-flex align-items-center mt-3">
                                    <!--begin::Option-->
                                    <div class="d-flex me-2">
                                        {!! create_switch($business->permission->id,$business->permission->is_phone == 1 ? true : false, 'BusinessNotificationPermission', 'is_phone') !!}
                                        <span class="fw-semibold ps-2 fs-6">Telefon</span>
                                    </div>

                                    <div class="d-flex me-2">
                                        {!! create_switch($business->permission->id,$business->permission->is_email == 1 ? true : false, 'BusinessNotificationPermission', 'is_email') !!}
                                        <span class="fw-semibold ps-2 fs-6">E-posta</span>
                                    </div>

                                    <div class="d-flex me-2">
                                        {!! create_switch($business->permission->id,$business->permission->is_sms == 1 ? true : false, 'BusinessNotificationPermission', 'is_sms') !!}
                                        <span class="fw-semibold ps-2 fs-6">Sms</span>
                                    </div>

                                    <div class="d-flex me-2">
                                        {!! create_switch($business->permission->id,$business->permission->is_notification == 1 ? true : false, 'BusinessNotificationPermission', 'is_notification') !!}
                                        <span class="fw-semibold ps-2 fs-6">Bildirim</span>
                                    </div>

                                </div>
                                <!--end::Options-->
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                    </div>
                    <!--end::Card body-->
                    <!--begin::Actions-->
                    <div class="card-footer d-flex justify-content-end py-6 px-9">
                        <button type="reset" class="btn btn-light btn-active-light-primary me-2">Discard</button>
                        <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">Save Changes</button>
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Content-->
        </div>
        @include('business.detail.author')
        @include('business.detail.deactive-account')

    </div>

@endsection

@section('scripts')
    <script>
        $(".timeSelector").flatpickr({
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
            time_24hr: true
        });
        $(".timeSelector2").flatpickr({
            enableTime: false,
            noCalendar: false,
            dateFormat: "d.m.Y",
        });
    </script>
    <script>
        $('[name="business_status"]').on('change', function () {
            let checkbox = $(this);
            if (checkbox.prop('checked')) {
                $('#stautsText').text("Aktif");
                checkbox.val('1');
            } else {
                $('#stautsText').text("Pasif");
                checkbox.val('0');
            }
        });
    </script>
    <script src="/assets/js/project/business/details/sign-in-method.js"></script>
    <script src="/assets/js/project/business/details/deactive-account.js"></script>

@endsection
