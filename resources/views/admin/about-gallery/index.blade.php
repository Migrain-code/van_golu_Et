@extends('admin.layouts.master')
@section('title', 'Hakkımızda Görselleri')
@section('styles')
 <style>
     .customImageArea{
         position: relative;
     }
     .delete-btn {
         background: var(--kt-danger-active) !important;
         color: white;
     }
 </style>
@endsection
@section('breadcrumb')
    <!--begin::Title-->
    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Hakkımızda Görselleri</h1>
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
        <li class="breadcrumb-item text-muted">Hakkımızda Görselleri</li>
        <!--end::Item-->
    </ul>
    <!--end::Breadcrumb-->
@endsection
@section('content')
    <div id="kt_app_content_container" class="app-container container-xxl">
        <!--begin::Card-->
        <div class="card">
            <!--begin::Card header-->
            @include('admin.about-gallery.components.toolbar')
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body pt-0">

                <div class="row">
                            @forelse($galleries as $gallery)
                                <!--begin::item-->
                                <a class="d-block overlay col-lg-3 col-12 mb-5" href="javascript:void(0)">
                                    <!--begin::Image-->
                                    <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-300px object-fit-cover"
                                         style="background-image:url('{{image($gallery->image)}}')">
                                    </div>
                                    <!--end::Image-->

                                    <!--begin::Action-->
                                    <div class="overlay-layer card-rounded bg-dark bg-opacity-25 shadow">
                                        <i class="bi bi-eye-fill text-white fs-3x"></i>
                                    </div>
                                    {!! create_form_delete_button('AboutGallery', $gallery->id, 'Hakkımızda Görselini', 'Hakkımızda Görselini Silmek istediğinize emin misiniz?') !!}


                                </a>
                                <!--end::item-->
                            @empty
                                @include('admin.layouts.components.alerts.empty-alert')
                            @endforelse
                        </div>

            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card-->

    </div>
    @include('admin.about-gallery.components.add-category')

@endsection

@section('scripts')

@endsection
