<div class="modal fade" id="kt_modal_create_account" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog mw-1000px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Title-->
                <h2>İşletme Hesabı Oluştur</h2>
                <!--end::Title-->
                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
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
            <div class="modal-body scroll-y m-5">
                <!--begin::Stepper-->
                <div class="stepper stepper-links d-flex flex-column" id="kt_create_account_stepper">
                    <!--begin::Nav-->
                    <div class="stepper-nav py-5">
                        <!--begin::Step 1-->
                        <div class="stepper-item current" data-kt-stepper-element="nav">
                            <h3 class="stepper-title">İşletme Kategorisi</h3>
                        </div>
                        <!--end::Step 1-->
                        <!--begin::Step 2-->
                        <div class="stepper-item" data-kt-stepper-element="nav">
                            <h3 class="stepper-title">Account Info</h3>
                        </div>
                        <!--end::Step 2-->
                        <!--begin::Step 3-->
                        <div class="stepper-item" data-kt-stepper-element="nav">
                            <h3 class="stepper-title">Business Details</h3>
                        </div>
                        <!--end::Step 3-->
                        <!--begin::Step 4-->
                        <div class="stepper-item" data-kt-stepper-element="nav">
                            <h3 class="stepper-title">Billing Details</h3>
                        </div>
                        <!--end::Step 4-->
                        <!--begin::Step 5-->
                        <div class="stepper-item" data-kt-stepper-element="nav">
                            <h3 class="stepper-title">Completed</h3>
                        </div>
                        <!--end::Step 5-->
                    </div>
                    <!--end::Nav-->
                    <!--begin::Form-->
                    <form class="mx-auto mw-600px w-100 py-10" novalidate="novalidate" id="kt_create_account_form">
                        <!--begin::Step 1-->
                        <div class="current" data-kt-stepper-element="content">
                            <!--begin::Wrapper-->
                            <div class="w-100">
                                <!--begin::Heading-->
                                <div class="pb-10 pb-lg-5">
                                    <!--begin::Title-->
                                    <h2 class="fw-bold d-flex align-items-center text-dark">İşletme Temel Bilgiler
                                        <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="İşletme Hangi Kategoride Hizmet Verecek"></i></h2>
                                    <!--end::Title-->

                                </div>

                                <!--end::Heading-->
                                <!--begin::Input group-->
                                <div class="fv-row">
                                    <!--begin:Options-->
                                    <div class="fv-row">
                                        <label class="d-block fw-semibold fs-6 mb-5">
                                            <span class="required">İşletme Kategori</span>
                                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="İşletme Hangi Kategoride Hizmet Verecek."></i>
                                        </label>
                                        @foreach($categories as $category)
                                            <!--begin:Option-->
                                            <label class="d-flex flex-stack mb-5 cursor-pointer">
                                                <!--begin:Label-->
                                                <span class="d-flex align-items-center me-2">
															<!--begin:Icon-->
															<img src="{{image($category->icon)}}" class="w-50px h-50px rounded me-6">

															<span class="d-flex flex-column">
																<span class="fw-bold fs-6">{{$category->getName()}}</span>
																<span class="fs-7 text-muted">{{\Illuminate\Support\Str::limit($category->getMetaDescription(),50)}}</span>
															</span>
                                                    <!--end:Info-->
                                                </span>
                                                <!--end:Label-->
                                                <!--begin:Input-->
                                                <span class="form-check form-check-custom form-check-solid">
															<input class="form-check-input" type="radio" name="category_id" value="{{$category->id}}" />
														</span>
                                                <!--end:Input-->
                                            </label>
                                            <!--end::Option-->
                                        @endforeach
                                    </div>
                                    <!--end:Options-->
                                </div>
                                <!--end::Input group-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Step 1-->
                        <!--begin::Step 2-->
                        <div data-kt-stepper-element="content">
                            <!--begin::Wrapper-->
                            <div class="w-100">
                                <!--begin::Heading-->
                                <div class="pb-10 pb-lg-5">
                                    <!--begin::Title-->
                                    <h2 class="fw-bold text-dark">Hesap Bilgileri</h2>
                                    <!--end::Title-->
                                    <!--begin::Notice-->
                                    <div class="text-muted fw-semibold fs-6">Bu işletmeyi kullanacak olan yönetici bilgileri</div>
                                    <!--end::Notice-->
                                </div>
                                <!--end::Heading-->
                                <!--begin::Input group-->
                                <div class="mb-10 fv-row">
                                    <!--begin::Label-->
                                    <label class="form-label mb-3">İşletme Sahibi Adı</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" class="form-control form-control-lg form-control-solid" name="official_name" placeholder="" value="" />
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->
                                <div class="mb-10 fv-row">
                                    <!--begin::Label-->
                                    <label class="form-label mb-3">Telefon Numarası</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" class="form-control form-control-lg form-control-solid" data-inputmask="'mask': '(999) 999-9999'"  name="phone" placeholder="" value="" />
                                    <!--end::Input-->
                                </div>
                                <div class="mb-10 fv-row">
                                    <!--begin::Label-->
                                    <label class="form-label mb-3">E-posta Adresi</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" class="form-control form-control-lg form-control-solid" name="email" placeholder="" value="" />
                                    <!--end::Input-->
                                </div>
                                <div class="mb-10 fv-row">
                                    <!--begin::Label-->
                                    <label class="form-label mb-3">Şifre</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" class="form-control form-control-lg form-control-solid" name="password" placeholder="" value="" />
                                    <!--end::Input-->
                                </div>
                                <div class="fv-row mb-7">
                                    <!--begin::Wrapper-->
                                    <div class="d-flex flex-stack">
                                        <!--begin::Label-->
                                        <div class="me-5">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold">Şifre Müşteriye Gönderilsin mi?</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <div class="fs-7 fw-semibold text-muted">Bu seçenek seçildiğinde şifre bu alana girdiğiniz telefon numarasına otomatik iletilir</div>
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Label-->
                                        <!--begin::Switch-->
                                        <label class="form-check form-switch form-check-custom form-check-solid">
                                            <!--begin::Input-->
                                            <input class="form-check-input" name="send_sms" type="checkbox" value="1" id="kt_modal_add_customer_billing" checked="checked">
                                            <!--end::Input-->
                                            <!--begin::Label-->
                                            <span class="form-check-label fw-semibold text-muted" id="customerSendSms" for="kt_modal_add_customer_billing">Evet</span>
                                            <!--end::Label-->
                                        </label>
                                        <!--end::Switch-->
                                    </div>
                                    <!--begin::Wrapper-->
                                </div>
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Step 2-->
                        <!--begin::Step 3-->
                        <div data-kt-stepper-element="content">
                            <!--begin::Wrapper-->
                            <div class="w-100">
                                <!--begin::Heading-->
                                <div class="pb-10 pb-lg-12">
                                    <!--begin::Title-->
                                    <h2 class="fw-bold text-dark">İşletme Detayı</h2>
                                    <!--end::Title-->
                                    <!--begin::Notice-->
                                    <div class="text-muted fw-semibold fs-6">İşletme Genel Bilgilerini Bu alanda Gireceksiniz</div>
                                    <!--end::Notice-->
                                </div>
                                <!--end::Heading-->
                                <!--begin::Input group-->
                                <div class="fv-row mb-10">
                                    <!--begin::Label-->
                                    <label class="form-label required">İşletme Adı</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input name="business_name" class="form-control form-control-lg form-control-solid" value="" />
                                    <!--end::Input-->
                                </div>
                                <div class="fw-row row mb-10">
                                    <div class="col-6">
                                        <!--begin::Label-->
                                        <label class="form-label required">İl</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <select name="city_id" id="city_select" aria-label="Şehir Seçiniz" data-control="select2" data-placeholder="Şehir Seçiniz..." data-dropdown-parent="#kt_modal_create_account" class="form-select form-select-solid fw-bold">
                                            <option value="">Şehir Seçiniz</option>
                                            @foreach($cities as $city)
                                                <option value="{{$city->id}}">{{$city->name}}</option>
                                            @endforeach
                                        </select>
                                        <!--end::Input-->
                                    </div>
                                    <div class="col-6">
                                        <!--begin::Label-->
                                        <label class="form-label required">İlçe</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <select name="district_id" aria-label="İlçe Seçiniz" data-control="select2" data-placeholder="İlçe Seçiniz..." data-dropdown-parent="#kt_modal_create_account" class="form-select form-select-solid fw-bold">
                                            <option value="">İlçe Seçiniz</option>

                                        </select>
                                        <!--end::Input-->
                                    </div>
                                </div>
                                <div class="fv-row row mb-10">
                                    <div class="col-6">
                                        <!--begin::Label-->
                                        <label class="form-label required">Açılış Saati</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input name="start_time" class="form-control form-control-lg form-control-solid timeSelector" value="" />
                                        <!--end::Input-->
                                    </div>
                                    <div class="col-6">
                                        <!--begin::Label-->
                                        <label class="form-label required">Kapanış Saati</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input name="end_time" class="form-control form-control-lg form-control-solid timeSelector" value="" />
                                        <!--end::Input-->
                                    </div>
                                </div>
                                <div class="fv-row row mb-10">
                                    <div class="col-6">
                                        <!--begin::Label-->
                                        <label class="form-label required">Tatil Günü</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <select name="off_day" class="form-select form-select-lg form-select-solid" data-control="select2" data-placeholder="Select..." data-allow-clear="true" data-hide-search="true">
                                            <option value=""></option>
                                            @foreach($dayList as $day)
                                                <option value="{{$day->id}}">{{$day->name}}</option>
                                            @endforeach
                                        </select>
                                        <!--end::Input-->
                                    </div>

                                    <div class="col-6">
                                        <!--begin::Label-->
                                        <label class="form-label required">Randevu Aralığı</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <select name="appointment_range" class="form-select form-select-lg form-select-solid" data-control="select2" data-placeholder="Select..." data-allow-clear="true" data-hide-search="true">
                                            <option value=""></option>
                                            @foreach($appointmentRanges as $range)
                                                <option value="{{$range->name}}">{{$range->name}}</option>
                                            @endforeach
                                        </select>
                                        <!--end::Input-->
                                    </div>
                                </div>

                                <div class="fv-row row mb-10">
                                    <div class="col-6">
                                        <!--begin::Label-->
                                        <label class="form-label required">Onay Türü</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <select name="approve_type" class="form-select form-select-lg form-select-solid" data-control="select2" data-placeholder="Select..." data-allow-clear="true" data-hide-search="true">
                                            <option value="">Onay Türü Seçiniz</option>
                                            <option value="0">Manuel Onay</option>
                                            <option value="1">Otomatik Onay</option>
                                        </select>
                                        <!--end::Input-->
                                    </div>

                                    <div class="col-6">
                                        <!--begin::Label-->
                                        <label class="form-label required">Kuruluş Tarihi</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input name="year" class="form-control form-control-lg form-control-solid timeSelector2" value="" />
                                        <!--end::Input-->
                                    </div>
                                </div>
                                <div class="fv-row mb-10">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-semibold mb-2">Cinsiyet Seçiniz
                                        <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Show your ads to either men or women, or select 'All' for both"></i></label>
                                    <!--End::Label-->
                                    <!--begin::Row-->
                                    <div class="row g-9" data-kt-buttons="true" data-kt-buttons-target="[data-kt-button='true']">
                                        <!--begin::Col-->
                                        <div class="col">
                                            <!--begin::Option-->
                                            <label class="btn btn-outline btn-outline-dashed btn-active-light-primary active d-flex text-start p-6" data-kt-button="true">
                                                <!--begin::Radio-->
                                                <span class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
															<input class="form-check-input" type="radio" name="campaign_gender" value="3" checked="checked" />
														</span>
                                                <!--end::Radio-->
                                                <!--begin::Info-->
                                                <span class="ms-5">
															<span class="fs-4 fw-bold text-gray-800 d-block">Unisex</span>
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
															<input class="form-check-input" type="radio" name="campaign_gender" value="2" />
														</span>
                                                <!--end::Radio-->
                                                <!--begin::Info-->
                                                <span class="ms-5">
															<span class="fs-4 fw-bold text-gray-800 d-block">Male</span>
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
															<input class="form-check-input" type="radio" name="campaign_gender" value="2" />
														</span>
                                                <!--end::Radio-->
                                                <!--begin::Info-->
                                                <span class="ms-5">
															<span class="fs-4 fw-bold text-gray-800 d-block">Female</span>
														</span>
                                                <!--end::Info-->
                                            </label>
                                            <!--end::Option-->
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Row-->
                                </div>

                                <!--begin::Input group-->
                                <div class="mb-10 fv-row">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center form-label mb-3">Personel Sayısı
                                        <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Provide your team size to help us setup your billing"></i></label>
                                    <!--end::Label-->
                                    <!--begin::Row-->
                                    <div class="row mb-2" data-kt-buttons="true">
                                        <!--begin::Col-->
                                        <div class="col">
                                            <!--begin::Option-->
                                            <label class="btn btn-outline btn-outline-dashed btn-active-light-primary w-100 p-4">
                                                <input type="radio" class="btn-check" name="personal_count" value="1-1" />
                                                <span class="fw-bold fs-3">1-1</span>
                                            </label>
                                            <!--end::Option-->
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col">
                                            <!--begin::Option-->
                                            <label class="btn btn-outline btn-outline-dashed btn-active-light-primary w-100 p-4 active">
                                                <input type="radio" class="btn-check" name="personal_count" checked="checked" value="2-10" />
                                                <span class="fw-bold fs-3">2-10</span>
                                            </label>
                                            <!--end::Option-->
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col">
                                            <!--begin::Option-->
                                            <label class="btn btn-outline btn-outline-dashed btn-active-light-primary w-100 p-4">
                                                <input type="radio" class="btn-check" name="personal_count" value="10-50" />
                                                <span class="fw-bold fs-3">10-50</span>
                                            </label>
                                            <!--end::Option-->
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col">
                                            <!--begin::Option-->
                                            <label class="btn btn-outline btn-outline-dashed btn-active-light-primary w-100 p-4">
                                                <input type="radio" class="btn-check" name="personal_count" value="50+" />
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
                                <!--end::Input group-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Step 3-->
                        <!--begin::Step 4-->
                        <div data-kt-stepper-element="content">
                            <!--begin::Wrapper-->
                            <div class="w-100">
                                <div class="pb-10 pb-lg-12">
                                    <!--begin::Title-->
                                    <h2 class="fw-bold text-dark">İşletme/Konum Yer Bilgileri</h2>
                                    <!--end::Title-->
                                    <!--begin::Notice-->
                                    <div class="text-muted fw-semibold fs-6">İşletmenin Yer bilgilerini buradan seçmelisiniz</div>
                                    <!--end::Notice-->
                                </div>

                                <div class="fw-row row mb-10">
                                    <input type="hidden" name="latitude" id="latitude" value="">
                                    <input type="hidden" name="longitude" id="longitude" value="">


                                    <!-- Harita Seçimi Alanı -->
                                    <div id="map-container" style="position: relative;">
                                        <input type="search" name="longitude" id="searchInput">
                                        <div id="map" style="height: 400px;"></div>
                                    </div>

                                </div>
                                <div class="fw-row">
                                    <textarea class="form-control form-control-lg form-control-solid" name="embed" id="embed" readonly rows="6"></textarea>
                                </div>
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Step 4-->
                        <!--begin::Step 5-->
                        <div data-kt-stepper-element="content">
                            <!--begin::Wrapper-->
                            <div class="w-100">
                                <!--begin::Heading-->
                                <div class="pb-8 pb-lg-10">
                                    <!--begin::Title-->
                                    <h2 class="fw-bold text-dark">Your Are Done!</h2>
                                    <!--end::Title-->
                                    <!--begin::Notice-->
                                    <div class="text-muted fw-semibold fs-6">If you need more info, please
                                        <a href="../../authentication/layouts/corporate/sign-in.html" class="link-primary fw-bold">Sign In</a>.</div>
                                    <!--end::Notice-->
                                </div>
                                <!--end::Heading-->
                                <!--begin::Body-->
                                <div class="mb-0">
                                    <!--begin::Text-->
                                    <div class="fs-6 text-gray-600 mb-5">Writing headlines for blog posts is as much an art as it is a science and probably warrants its own post, but for all advise is with what works for your great & amazing audience.</div>
                                    <!--end::Text-->
                                    <!--begin::Alert-->
                                    <!--begin::Notice-->
                                    <div class="notice d-flex bg-light-warning rounded border-warning border border-dashed p-6">
                                        <!--begin::Icon-->
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen044.svg-->
                                        <span class="svg-icon svg-icon-2tx svg-icon-warning me-4">
													<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
														<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor" />
														<rect x="11" y="14" width="7" height="2" rx="1" transform="rotate(-90 11 14)" fill="currentColor" />
														<rect x="11" y="17" width="2" height="2" rx="1" transform="rotate(-90 11 17)" fill="currentColor" />
													</svg>
												</span>
                                        <!--end::Svg Icon-->
                                        <!--end::Icon-->
                                        <!--begin::Wrapper-->
                                        <div class="d-flex flex-stack flex-grow-1">
                                            <!--begin::Content-->
                                            <div class="fw-semibold">
                                                <h4 class="text-gray-900 fw-bold">We need your attention!</h4>
                                                <div class="fs-6 text-gray-700">To start using great tools, please,
                                                    <a href="vertical.html" class="fw-bold">Create Team Platform</a></div>
                                            </div>
                                            <!--end::Content-->
                                        </div>
                                        <!--end::Wrapper-->
                                    </div>
                                    <!--end::Notice-->
                                    <!--end::Alert-->
                                </div>
                                <!--end::Body-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Step 5-->
                        <!--begin::Actions-->
                        <div class="d-flex flex-stack pt-15">
                            <!--begin::Wrapper-->
                            <div class="mr-2">
                                <button type="button" class="btn btn-lg btn-light-primary me-3" data-kt-stepper-action="previous">
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr063.svg-->
                                    <span class="svg-icon svg-icon-4 me-1">
											<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
												<rect opacity="0.5" x="6" y="11" width="13" height="2" rx="1" fill="currentColor" />
												<path d="M8.56569 11.4343L12.75 7.25C13.1642 6.83579 13.1642 6.16421 12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75L5.70711 11.2929C5.31658 11.6834 5.31658 12.3166 5.70711 12.7071L11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25C13.1642 17.8358 13.1642 17.1642 12.75 16.75L8.56569 12.5657C8.25327 12.2533 8.25327 11.7467 8.56569 11.4343Z" fill="currentColor" />
											</svg>
										</span>
                                    <!--end::Svg Icon-->Back</button>
                            </div>
                            <!--end::Wrapper-->
                            <!--begin::Wrapper-->
                            <div>
                                <button type="button" class="btn btn-lg btn-primary me-3" data-kt-stepper-action="submit">
											<span class="indicator-label">Submit
                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
											<span class="svg-icon svg-icon-3 ms-2 me-0">
												<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="currentColor" />
													<path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="currentColor" />
												</svg>
											</span>
                                                <!--end::Svg Icon--></span>
                                    <span class="indicator-progress">Please wait...
											<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                                <button type="button" class="btn btn-lg btn-primary" data-kt-stepper-action="next">Continue
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
                                    <span class="svg-icon svg-icon-4 ms-1 me-0">
											<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
												<rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="currentColor" />
												<path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="currentColor" />
											</svg>
										</span>
                                    <!--end::Svg Icon--></button>
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Actions-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Stepper-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
