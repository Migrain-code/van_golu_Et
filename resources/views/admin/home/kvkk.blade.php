@extends('admin.layouts.master')

@section('content')
<!--begin::Content container-->
<div id="kt_app_content_container" class="app-container container-xxl">
    <form enctype="multipart/form-data" class="form" action="{{route('admin.settings.update')}}" method="post">
        @csrf
        @foreach($languages as $language)
            <div class="fv-row mb-7">
                <!--begin::Label-->
                <label class="required fs-6 fw-semibold mb-2">Kvkk Metni  ({{$language->name}})</label>
                <!--end::Label-->
                <!--begin::Input-->
                <textarea type="text" class="form-control form-control-solid tinyMiceEditor" placeholder="" name="kvkk_content_{{$language->code}}_text">{{setting('kvkk_content_'.$language->code."_text")}}</textarea>
                <!--end::Input-->
            </div>
        @endforeach

        <button type="submit" id="kt_modal_add_customer_submit" class="btn btn-primary w-100">
            <span class="indicator-label">Kaydet</span>
            <span class="indicator-progress">Please wait...
															<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
        </button>
    </form>
</div>
<!--end::Content container-->
@endsection
@section('scripts')
    <script src="/assets/js/tinymce/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: ".tinyMiceEditor",
            height : "400",
            language: 'tr',
            plugins : "advlist autolink link image lists charmap print preview",
            toolbar: "formatselect | bold italic underline | alignleft aligncenter alignright | numlist bullist | link image | preview",
        });
    </script>
@endsection
