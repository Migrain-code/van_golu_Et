@extends('layouts.master')
@section('title', 'İşletme Hizmet Listesi')
@section('styles')
    <style>


        /* Select2 dropdown menüsü için z-index değerini daha fazla artır */
        .select2-container--open {
            z-index: 1060; /* Örnek bir değer, gerektiğinde ayarlayabilirsiniz */
        }
    </style>
@endsection
@section('content')
    <div id="kt_app_content_container" class="app-container container-xxl">
        @include('business.detail.layouts.header')
        <div class="card mb-5 mb-xl-10">
            <!--begin::Card header-->
            <!--begin::Card title-->
            @include('business.services.components.toolbar')
            <!--end::Card title-->
            <!--begin::Service Table-->
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
                        {{--  <th class="min-w-50px">Görsel</th> --}}
                        <th class="min-w-125px">Hizmet Adı</th>
                        <th class="min-w-125px">Türü</th>
                        <th class="min-w-125px">Sıra Numarası</th>
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
            <!--end::Service Table-->
            @include('business.services.components.add-service')
            @include('business.services.components.export-modal')
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        let DATA_URL = "{{route('admin.businessService.datatable')}}";
        let DATA_COLUMNS = [
            {data: 'id'},
            /*{data: 'image'},*/
            {data: 'name'},
            {data: 'type'},
            {data: 'order_number'},
            {data: 'created_at'},
            {data: 'action'}
        ];
    </script>

    <script>
        $(document).on('change', '[name="category_id"]', function () {

            let service_category_id = $(this).val();
            var sub_category = $('[name="sub_category_id"]');
            sub_category.empty();
            $.ajax({
                url: '{{route('admin.businessService.serviceGet')}}',
                type: "POST",
                data: {
                    "_token": csrf_token,
                    'service_category_id': service_category_id,
                },
                dataType: "JSON",
                success: function (res) {
                    sub_category.append('<option value="">Hizmet Seçiniz</option>');

                    $.each(res, function (index, item) {
                        sub_category.append('<option value="' + item.id + '">' + item.name.{{\Illuminate\Support\Facades\App::getLocale()}} + '</option>');
                    });
                }
            });
        });
    </script>

    <script src="/assets/js/custom.js"></script>
    <script src="/assets/js/project/business/services/add.js"></script>
    <script src="/assets/js/project/business/services/listing.js"></script>

@endsection
