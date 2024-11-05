@extends('admin.layouts.master')

@section('content')
<!--begin::Content container-->
<div id="kt_app_content_container" class="app-container container-xxl">
    <!--begin::Row-->
    @include('admin.home.components.row1')
    <!--end::Row-->
    <!--begin::Row-->
    @include('admin.home.components.row2')
    <!--end::Row-->
    <!--begin::Row-->
    @include('admin.home.components.row3')
    <!--end::Row-->
</div>
<!--end::Content container-->
@endsection
