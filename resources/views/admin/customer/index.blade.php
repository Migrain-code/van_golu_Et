@extends('admin.layouts.master')
@section('title', 'Müşteri Listesi')
@section('styles')
    <style>
        .image-input .image-input-wrapper {
            background-image: url('/assets/media/svg/avatars/blank.svg');
        }

        [data-bs-theme="dark"] .image-input .image-input-wrapper {
            background-image: url('/assets/media/svg/avatars/blank-dark.svg');
        }
    </style>
@endsection
@section('breadcrumb')
    <!--begin::Title-->
    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Ana Panel</h1>
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
        <li class="breadcrumb-item text-muted">Dashboard</li>
        <!--end::Item-->
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-400 w-5px h-2px"></span>
        </li>
        <!--end::Item-->
        <!--begin::Item-->
        <li class="breadcrumb-item text-muted">Müşteriler</li>
        <!--end::Item-->
    </ul>
    <!--end::Breadcrumb-->
@endsection
@section('content')
    <div id="kt_app_content_container" class="app-container container-xxl">
        <!--begin::Card-->
        <div class="card">
            <!--begin::Card header-->
            @include('admin.customer.components.toolbar')
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body pt-0">
                <!--begin::Table-->
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
                            <th class="min-w-125px">Müşteri Adı</th>
                            <th class="min-w-125px">Telefon</th>
                            <th class="min-w-125px">Status</th>
                            <th class="min-w-125px">Konum</th>
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
                <!--end::Table-->
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card-->
        <!--begin::Modals-->
        @include('admin.customer.components.add-customer')
        @include('admin.customer.components.export-modal')
        <!--end::Modals-->
    </div>

@endsection

@section('scripts')
    <script>
        let DATA_URL = "{{route('admin.customer.datatable')}}";
        let DATA_COLUMNS = [
            {data: 'id'},
            {data: 'name'},
            {data: 'phone'},
            {data: 'status'},
            {data: 'email'},
            {data: 'created_at'},
            {data: 'action'}
        ];
        let addUrl = "{{route('admin.customer.store')}}"
    </script>

    <script src="/assets/js/custom.js"></script>
    <script src="/assets/js/project/customer/add.js"></script>
    <script src="/assets/js/project/customer/export.js"></script>
    <script src="/assets/js/project/customer/listing.js"></script>
    <script>
        $('[name="send_sms"]').on('change', function (){
            let checkbox = $(this);
            if (checkbox.prop('checked')) {
                $('#customerSendSms').text("Evet");
                checkbox.val('1');
            } else {
                $('#customerSendSms').text("Hayır");
                checkbox.val('0');
            }
        });
    </script>
@endsection
