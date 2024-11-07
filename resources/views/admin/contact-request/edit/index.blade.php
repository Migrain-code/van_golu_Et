@extends('admin.layouts.master')
@section('title', 'İletişim Talebi Düzenle')
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
    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">İletişim Talebi Düzenle</h1>
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
            <a href="{{route('admin.contact-request.index')}}" class="text-muted text-hover-primary">İletişim Talepleri</a>
        </li>
        <!--end::Item-->
        <!--begin::Item-->
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-400 w-5px h-2px"></span>
        </li>

        <li class="breadcrumb-item text-muted">
           İletişim Talebi Düzenle
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
                <div class="card-title">İletişim Talebi Düzenle</div>
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body pt-0">
                <form class="form" action="{{route('admin.contact-request.update', $contactRequest->id)}}" method="post" id="kt_modal_add_faq_form" enctype="multipart/form-data" data-kt-redirect="">
                    <!--begin::Modal body-->
                    @csrf
                    @method('PUT')
                    <div class="modal-body py-10 px-lg-17">
                        <!--begin::Scroll-->
                            <!--begin::Input group-->
                            <ul class="nav nav-tabs nav-line-tabs mb-5 fs-6">

                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#kt_tab_pane_1">Talep Bilgileri</a>
                                </li>
                            </ul>

                            <div class="tab-content" id="myTabContent">
                                @include('admin.contact-request.edit.tabs.tab')
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
    </div>

@endsection

@section('scripts')

@endsection
