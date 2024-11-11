@extends('admin.layouts.master')
@section('title', 'Kullanıcı Detayı')
@section('styles')

@endsection
@section('content')
    <div id="kt_app_content_container" class="app-container container-xxl">
        <!--begin::Layout-->
        <div class="d-flex flex-column flex-xl-row">
            @include('admin.user.detail.component.profile')
            <div class="flex-lg-row-fluid ms-lg-15">
                <div class="tab-content" id="myTabContent">
                    @include('admin.user.detail.component.tabs.tab2')
                </div>
            </div>
        </div>
        <!--end::Layout-->


        <!--end::Modals-->
    </div>

@endsection

@section('scripts')

@endsection
