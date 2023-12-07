@extends('layouts.master')
@section('title', 'İşletme SSS Kategorisi Düzenle')
@section('styles')
    <style>
        .nav-line-tabs .nav-item .nav-link {
            color: var(--kt-gray-500);
            border: 0;
            border-bottom: 1px solid transparent;
            transition: color 0.2s ease;
            padding: 0.5rem 0;
            margin: 0 1rem;
            font-weight: bold;
            font-size: 16px;
        }
    </style>
@endsection
@section('breadcrumb')
    <!--begin::Title-->
    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">İşletme SSS Kategorileri</h1>
    <!--end::Title-->
    <!--begin::Breadcrumb-->
    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
        <!--begin::Item-->
        <li class="breadcrumb-item text-muted">
            <a href="{{route('admin.home')}}" class="text-muted text-hover-primary">Home</a>
        </li>
        <!--end::Item-->
        <!--begin::Item-->
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-400 w-5px h-2px"></span>
        </li>
        <!--end::Item-->
        <!--begin::Item-->
        <li class="breadcrumb-item text-muted">
            <a href="{{route('admin.home')}}" class="text-muted text-hover-primary">Dashboard</a>
        </li>
        <!--end::Item-->
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-400 w-5px h-2px"></span>
        </li>
        <!--end::Item-->
        <!--begin::Item-->
        <li class="breadcrumb-item text-muted"></li>
        <!--end::Item-->
        <li class="breadcrumb-item text-muted">
            <a href="{{route('admin.businessFaqCategory.index')}}" class="text-muted text-hover-primary">İşletme SSS Kategorileri</a>
        </li>
        <!--end::Item-->
        <!--begin::Item-->
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-400 w-5px h-2px"></span>
        </li>

        <li class="breadcrumb-item text-muted">
            İşletme SSS Kategorisi Düzenle
        </li>
    </ul>
    <!--end::Breadcrumb-->
@endsection

@section('content')

    <div id="kt_app_content_container" class="app-container container-xxl">
        <!--begin::Card-->
        <div class="card">
            <!--begin::Card header-->
            <div class="card-header">
                <div class="card-title">SSS Kategorisi Düzenle</div>

            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body pt-0">
                <form class="form" action="{{route('admin.businessFaqCategory.update', $businessFaqCategory->id)}}" method="post" id="kt_modal_add_faq_form" enctype="multipart/form-data" data-kt-redirect="">
                    <!--begin::Modal body-->
                    @csrf
                    @method('PUT')
                    <div class="modal-body py-10 px-lg-17">
                        <!--begin::Scroll-->
                        <div class="scroll-y me-n7 pe-7" id="kt_modal_add_faq_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_faq_header" data-kt-scroll-wrappers="#kt_modal_add_faq_scroll" data-kt-scroll-offset="300px">
                            <!--begin::Input group-->
                            <ul class="nav nav-tabs nav-line-tabs mb-5 fs-6">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#kt_tab_pane_1">Kategori Adları</a>
                                </li>
                            </ul>

                            <div class="tab-content" id="myTabContent">
                                @include('category.business-faq-category.detail.tabs.tab1')
                            </div>

                        </div>
                        <!--end::Scroll-->
                    </div>
                    <!--end::Modal body-->
                    <!--begin::Modal footer-->
                    <div class="modal-footer flex-center">
                        <!--begin::Button-->
                        <button type="submit" id="kt_modal_add_faq_submit" class="btn btn-primary">
                            <span class="indicator-label">Submit</span>
                            <span class="indicator-progress">Please wait...
															<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                        <!--end::Button-->
                    </div>
                    <!--end::Modal footer-->
                </form>

            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card-->
        <div class="card mt-5">
            <!--begin::Card header-->

            @include('category.business-faq-category.detail.modals.toolbar')

            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body pt-0">
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
                        <th class="min-w-125px">Soru</th>
                        <th class="min-w-125px">Created Date</th>
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
            <!--end::Card body-->
        </div>

        @include('category.business-faq-category.detail.modals.add-faq')
    </div>

@endsection

@section('scripts')
    <script>
        let DATA_URL = "{{route('admin.businessFaq.datatable')}}";
        let DATA_COLUMNS = [
            {data: 'id'},
            {data: 'question'},
            {data: 'created_at'},
            {data: 'action'}
        ];
        let addUrl = "{{route('admin.businessFaq.store')}}"
    </script>
    <script src="/assets/js/custom.js"></script>
    <script src="/assets/js/project/category/business-faq-category/detail/listing.js"></script>
    <script src="/assets/js/project/category/business-faq-category/detail/add.js"></script>
@endsection
