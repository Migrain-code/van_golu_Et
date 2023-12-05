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
    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Etkinlik Sponsoru Düzenle</h1>
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
        <li class="breadcrumb-item text-muted">
            <a href="{{route('admin.activity.edit', $activitySponsor->activity_id)}}" class="text-muted text-hover-primary">Etkinlik Detayı</a>
        </li>
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-400 w-5px h-2px"></span>
        </li>
        <li class="breadcrumb-item text-muted">Etkinlik Sponsoru Düzenle</li>

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
                <form class="form" action="{{route('admin.activitySponsor.update', $activitySponsor->id)}}" method="post" id="kt_modal_add_customer_form" enctype="multipart/form-data" data-kt-redirect="">
                    <!--begin::Modal body-->
                    @csrf
                    @method('PUT')
                    <div class="modal-body py-10 px-lg-17">
                        <!--begin::Scroll-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fs-6 fw-semibold mb-2">Adı</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" class="form-control form-control-solid" placeholder="" name="name" value="{{$activitySponsor->name}}"/>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fs-6 fw-semibold mb-2">link</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" class="form-control form-control-solid" placeholder="" name="link" value="{{$activitySponsor->link}}"/>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fs-6 fw-semibold mb-2">Sponsor Logosu <a href="{{image($activitySponsor->image)}}" target="_blank">(Görüntüle)</a></label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="file" class="form-control form-control-solid" placeholder="" name="sponsor_image"/>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <label class="required fs-6 fw-semibold mb-2">Ana sponsor</label>
                                <label class="form-check form-switch form-check-custom form-check-solid">
                                    <!--begin::Input-->
                                    <input class="form-check-input" name="is_main_sponsor" type="checkbox" @checked($activitySponsor->status == 1) value="{{$activitySponsor->status == 1 ? 1 : 0}}" id="kt_modal_add_sponsor_box">
                                    <!--end::Input-->

                                </label>
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-7" id="sponsor_text" style="@if($activitySponsor->status == 1) display: none @endif">
                                <!--begin::Label-->
                                <label class="required fs-6 fw-semibold mb-2">Metin</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" class="form-control form-control-solid" placeholder="" name="sponsor_text" value="{{$activitySponsor->text}}"/>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
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
    </div>

@endsection

@section('scripts')
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
