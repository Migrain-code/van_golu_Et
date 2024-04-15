@extends('layouts.master')
@section('title', 'Müşteri Detayı')
@section('styles')

@endsection
@section('content')
    <div id="kt_app_content_container" class="app-container container-xxl">
        <!--begin::Layout-->
        <div class="d-flex flex-column flex-xl-row">
            @include('customer.detail.component.profile')
            <!--begin::Content-->
            <div class="flex-lg-row-fluid ms-lg-15">
                <!--begin:::Tabs-->
                <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-semibold mb-8">
                    <!--begin:::Tab item-->
                    <li class="nav-item">
                        <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab"
                           href="#kt_ecommerce_customer_overview">Genel Bakış</a>
                    </li>
                    <!--end:::Tab item-->
                    <!--begin:::Tab item-->
                    <li class="nav-item">
                        <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab"
                           href="#kt_ecommerce_customer_general">Bilgiler</a>
                    </li>
                    <!--end:::Tab item-->
                    <!--begin:::Tab item-->
                    <li class="nav-item">
                        <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab"
                           href="#kt_ecommerce_customer_advanced">Güvenlik ve İzinler</a>
                    </li>
                    <!--end:::Tab item-->
                    <!--begin:::Tab item-->
                    <li class="nav-item">
                        <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab"
                           href="#kt_ecommerce_customer_comments">Yorumlar</a>
                    </li>
                    <!--end:::Tab item-->
                    <!--begin:::Tab item-->
                    <li class="nav-item">
                        <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab"
                           href="#kt_ecommerce_customer_notifications">Bildirimler</a>
                    </li>
                    <!--end:::Tab item-->
                </ul>
                <!--end:::Tabs-->
                <!--begin:::Tab content-->
                <div class="tab-content" id="myTabContent">
                    @include('customer.detail.component.tabs.tab1')
                    @include('customer.detail.component.tabs.tab2')
                    @include('customer.detail.component.tabs.tab3')
                    @include('customer.detail.component.tabs.tab4')
                    @include('customer.detail.component.tabs.tab5')
                </div>
                <!--end:::Tab content-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Layout-->

        @include('customer.detail.modals.update-phone')
        @include('customer.detail.modals.update-password')
        @include('customer.detail.modals.verify')
        @include('customer.detail.modals.edit-comment')
        @include('customer.detail.modals.add-notification')

        <!--end::Modals-->
    </div>

@endsection

@section('scripts')
    <script>
        let updateUrl = "{{route('admin.customer.update', $customer->id)}}";
        let phoneUpdateUrl = "{{route('admin.customer.updatePhone')}}";
        let verifyPhoneUrl = "{{route('admin.customer.verifyPhone')}}";
        let updatePasswordUrl = "{{route('admin.customer.updatePassword')}}";
        let csrf_token_phone = "{{csrf_token()}}";
    </script>

    <script src="/assets/js/project/customer/details/appointment-history.js"></script>
    <script src="/assets/js/project/customer/details/update-password.js"></script>

    <script src="/assets/js/project/customer/details/update-profile.js"></script>

    <script src="/assets/js/project/customer/details/update-phone.js"></script>
    <script src="/assets/js/project/customer/details/update-verify.js"></script>
    <script src="/assets/js/project/customer/details/update-comment.js"></script>
    <script src="/assets/js/project/customer/details/add-notification.js"></script>

    <script>
        $('[name="send_sms"]').on('change', function () {
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

    @if($customer->city_id)
        <script>

            // ilçe bilgisini seçtir
            var customerDistrictId = parseInt('{{$customer->district_id}}');
            let id = $('[name="city_id"]').val();
            var district = $('[name="district_id"]');
            district.empty();
            $.ajax({
                url: ajax_urls.getDistrictUrl,
                type: "POST",
                data: {
                    "_token": csrf_token,
                    'id': id,
                },
                dataType: "JSON",
                success: function (res) {
                    $.each(res, function (index, item) {

                        var selected = (customerDistrictId === item.id) ? 'selected' : '';

                        district.append('<option value="' + item.id + '" ' + selected + '>' + item.name + '</option>');

                    });
                }
            });
        </script>
    @endif
    <script>
        function getComment(id) {
            $.ajax({
                url: "/dashboard/businessComment/"+ id,
                type: "GET",
                dataType: "JSON",
                success: function (res) {
                    if(res.status == "success"){
                        $('#commentID').val(res.comment.id);
                        $('#commentText').text(res.comment.content);
                    }
                    else{
                        location.reload();
                    }
                }
            });
        }
    </script>

@endsection
