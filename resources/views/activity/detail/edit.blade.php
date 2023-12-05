@extends('layouts.master')
@section('title', 'Etkinlik Düzenle')
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
    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Etkinlik Düzenle</h1>
    <!--end::Title-->
    <!--begin::Breadcrumb-->
    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
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
        <li class="breadcrumb-item text-muted">
            <a href="{{route('admin.activity.index')}}" class="text-muted text-hover-primary">Etkinlikler</a>
        </li>
        <!--end::Item-->
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-400 w-5px h-2px"></span>
        </li>
        <li class="breadcrumb-item text-muted">Etkinlik Düzenle</li>
    </ul>
    <!--end::Breadcrumb-->
@endsection

@section('content')
    <div id="kt_app_content_container" class="app-container container-xxl">
        <!--begin::Card-->
        <div class="card">
            <!--begin::Card header-->
            <div class="card-header">
                <div class="card-title">Etkinlik Düzenle</div>
                <div class="card-toolbar">
                    <!--begin::Toolbar-->
                    <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                        <!--begin::Add customer-->
                        <button type="button" class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#kt_modal_personal_list">Katılımcılar</button>
                        <!--end::Add customer-->
                        <!--begin::Add customer-->
                        <button type="button" class="btn btn-info me-2" data-bs-toggle="modal" data-bs-target="#kt_modal_activity_sponsor_list">Sponsorlar</button>
                        <!--end::Add customer-->
                    </div>

                </div>
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body pt-0">
                    <form class="form" action="{{route('admin.activity.update', $activity->id)}}" method="post" id="kt_modal_add_customer_form" enctype="multipart/form-data" data-kt-redirect="">
                        <!--begin::Modal body-->
                        @csrf
                        @method('PUT')
                        <div class="modal-body py-10 px-lg-17">
                            <!--begin::Scroll-->
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
                                @include('activity.detail.tabs.tab1')
                                @include('activity.detail.tabs.tab2')
                                @include('activity.detail.tabs.tab3')
                                @include('activity.detail.tabs.tab4')
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
            </div>

            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card-->
        @include('activity.detail.modals.add-sponsor')
        @include('activity.detail.modals.personals')
        @include('activity.detail.modals.sponsor-list')
    </div>

@endsection

@section('scripts')

    <script>
        let DATA_URL = "{{route('admin.activitySponsor.datatable')}}";
        let DATA_COLUMNS = [
            {data: 'id'},
            {data: 'name'},
            {data: 'link'},
            {data: 'status'},
            {data: 'created_at'},
            {data: 'action'}
        ];
        let DATA_URL_PERSONAL = "{{route('admin.activityPersonal.datatable')}}";
        let DATA_COLUMNS_PERSONAL = [
            {data: 'id'},
            {data: 'image'},
            {data: 'name'},
            {data: 'status'},
            {data: 'created_at'},
            {data: 'action'}
        ];
    </script>

    <script src="/assets/js/custom.js"></script>
    <script src="/assets/js/project/activity/sponsor/listing.js"></script>
    <script src="/assets/js/project/activity/personal/listing.js"></script>
    <script src="/assets/js/project/activity/sponsor/add.js"></script>
    <script>
        $("#kt_daterangepicker_2").daterangepicker({
            timePicker: true,
            timePicker24Hour: true,
            startDate: '{{\Illuminate\Support\Carbon::parse($activity->start_time)->format('m/d H:i')}}',
            endDate:'{{\Illuminate\Support\Carbon::parse($activity->end_time)->format('m/d H:i')}}',
            locale: {
                format: "M/DD HH:mm"
            }
        });
    </script>
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('kt_docs_ckeditor_classic_tr');
        CKEDITOR.replace('kt_docs_ckeditor_classic_en');
        CKEDITOR.replace('kt_docs_ckeditor_classic_de');
        CKEDITOR.replace('kt_docs_ckeditor_classic_es');
        CKEDITOR.replace('kt_docs_ckeditor_classic_fr');
        CKEDITOR.replace('kt_docs_ckeditor_classic_it');

    </script>
    <script>
        $('#kt_modal_add_sponsor_box').on('change', function () {
            let checkbox = $(this);
            if (checkbox.prop('checked')) {
                $('#sponsor_text').css('display', 'none');
                checkbox.val('1');
            } else {
                $('#sponsor_text').css('display', 'block');
                checkbox.val('0');
            }
        });
    </script>
@endsection
