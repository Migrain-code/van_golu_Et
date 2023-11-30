<!--begin::Modal - Adjust Balance-->
<div class="modal fade" id="kt_modal_activity_sponsor_list" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-950px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header border-0 pt-6">
                <!--begin::Card title-->
                <div class="card-title">
                    <!--begin::Search-->
                    <div class="d-flex align-items-center position-relative my-1">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                        <span class="svg-icon svg-icon-1 position-absolute ms-6">
														<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
															<rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
															<path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor" />
														</svg>
													</span>
                        <!--end::Svg Icon-->
                        <input type="text" data-kt-sponsor-table-filter="search" class="form-control form-control-solid w-250px ps-15" placeholder="Search Customers" />
                    </div>
                    <!--end::Search-->
                </div>
                <!--begin::Card title-->
                <!--begin::Card toolbar-->
                <div class="card-toolbar">
                    <!--begin::Toolbar-->
                    <div class="d-flex justify-content-end" data-kt-sponsor-table-toolbar="base">
                        <!--begin::Filter-->
                        <div class="w-150px me-3">
                            <!--begin::Select2-->
                            {{--
                                <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Status" data-kt-ecommerce-order-filter="status">
                                <option></option>
                                <option value="all">All</option>
                                <option value="1">Active</option>
                                <option value="0">Locked</option>
                            </select>
                            --}}
                            <!--end::Select2-->
                        </div>
                        <!--end::Filter-->

                        <!--begin::Add customer-->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_sponsor_modal">Sponsor Ekle</button>
                        <!--end::Add customer-->
                    </div>
                    <!--end::Toolbar-->
                    <!--begin::Group actions-->
                    <div class="d-flex justify-content-end align-items-center d-none" data-kt-sponsor-table-toolbar="selected">
                        <div class="fw-bold me-5">
                            <span class="me-2" data-kt-sponsor-table-select="selected_count"></span>Selected</div>
                        <button type="button" class="btn btn-danger" data-kt-customer-table-select="delete_selected">Delete Selected</button>
                    </div>
                    <!--end::Group actions-->
                </div>
                <!--end::Card toolbar-->
            </div>

            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                <table class="table align-middle table-row-dashed fs-6 gy-5" id="datatable">
                    <!--begin::Table head-->
                    <thead>
                    <!--begin::Table row-->
                    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                        <th class="w-10px pe-2">
                            <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                <input class="form-check-input delete" type="checkbox" data-kt-check="true" data-kt-check-target="#datatable .delete" value="1" />
                            </div>
                        </th>
                        <th class="min-w-125px">Adı</th>
                        <th class="min-w-125px">Link</th>
                        <th class="min-w-125px">Ana sponsor</th>
                        <th class="min-w-125px">Tarih</th>
                        <th class="text-end min-w-70px">Actions</th>
                    </tr>
                    <!--end::Table row-->
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody class="fw-semibold text-gray-600">

                    </tbody>
                    <!--end::Table body-->
                </table>

            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!--end::Modal - New Card-->
