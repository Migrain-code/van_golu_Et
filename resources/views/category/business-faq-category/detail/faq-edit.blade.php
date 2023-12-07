@extends('layouts.master')
@section('title', 'SSS Düzenle')
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
    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">SSS Düzenle</h1>
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
            <a href="{{route('admin.businessFaqCategory.index')}}" class="text-muted text-hover-primary">İşletme SSS Kategorileri</a>
        </li>
        <!--end::Item-->
        <!--begin::Item-->
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-400 w-5px h-2px"></span>
        </li>

        <li class="breadcrumb-item text-muted">
            İşletme SSS Düzenle
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
                <div class="card-title">SSS Düzenle</div>

            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body pt-0">
                <form class="form" action="{{route('admin.businessFaq.update', $businessFaq->id)}}" method="post" id="kt_modal_add_faq_form" enctype="multipart/form-data" data-kt-redirect="">
                    <!--begin::Modal body-->
                    @csrf
                    @method('PUT')

                    <!--begin::Scroll-->
                    <div class="scroll-y me-n7 pe-7" id="kt_modal_add_faq_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_faq_header" data-kt-scroll-wrappers="#kt_modal_add_faq_scroll" data-kt-scroll-offset="300px">
                        <!--begin::Input group-->
                        <div class="modal-content">
                            <!--begin::Form-->
                                <!--begin::Modal body-->
                                <div class="modal-body py-10 px-lg-17">
                                    <!--begin::Scroll-->
                                    <div class="scroll-y me-n7 pe-7" id="kt_modal_add_customer_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_customer_header" data-kt-scroll-wrappers="#kt_modal_add_customer_scroll" data-kt-scroll-offset="300px">

                                        <!--begin::Input group-->
                                        <ul class="nav nav-tabs nav-line-tabs mb-5 fs-6">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-bs-toggle="tab" href="#kt_tab_pane_3">Sorular</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-bs-toggle="tab" href="#kt_tab_pane_4">Cevaplar</a>
                                            </li>
                                        </ul>

                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade show active" id="kt_tab_pane_3" role="tabpanel">
                                                <input type="hidden" name="category_id" value="{{$businessFaq->category_id}}">
                                                <div class="fv-row mb-7">
                                                    <!--begin::Label-->
                                                    <label class="required fs-6 fw-semibold mb-2">Soru (Türkçe)</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input type="text" class="form-control form-control-solid" placeholder="" name="question[tr]" value="{{$customerFaq->getTranslation('question', 'tr')}}" />
                                                    <!--end::Input-->
                                                </div>
                                                <div class="fv-row mb-7">
                                                    <!--begin::Label-->
                                                    <label class="required fs-6 fw-semibold mb-2">Soru (İngilizce)</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input type="text" class="form-control form-control-solid" placeholder="" name="question[en]" value="{{$customerFaq->getTranslation('question', 'en')}}" />
                                                    <!--end::Input-->
                                                </div>
                                                <div class="fv-row mb-7">
                                                    <!--begin::Label-->
                                                    <label class="required fs-6 fw-semibold mb-2">Soru (Almanca)</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input type="text" class="form-control form-control-solid" placeholder="" name="question[de]" value="{{$customerFaq->getTranslation('question', 'de')}}" />
                                                    <!--end::Input-->
                                                </div>

                                                <div class="fv-row mb-7">
                                                    <!--begin::Label-->
                                                    <label class="required fs-6 fw-semibold mb-2">Soru (İspanyolca)</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input type="text" class="form-control form-control-solid" placeholder="" name="question[es]" value="{{$customerFaq->getTranslation('question', 'es')}}" />
                                                    <!--end::Input-->
                                                </div>

                                                <div class="fv-row mb-7">
                                                    <!--begin::Label-->
                                                    <label class="required fs-6 fw-semibold mb-2">Soru (Fransızca)</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input type="text" class="form-control form-control-solid" placeholder="" name="question[fr]" value="{{$customerFaq->getTranslation('question', 'fr')}}" />
                                                    <!--end::Input-->
                                                </div>

                                                <div class="fv-row mb-7">
                                                    <!--begin::Label-->
                                                    <label class="required fs-6 fw-semibold mb-2">Soru (İtalyanca)</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input type="text" class="form-control form-control-solid" placeholder="" name="question[it]" value="{{$customerFaq->getTranslation('question', 'it')}}" />
                                                    <!--end::Input-->
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="kt_tab_pane_4" role="tabpanel">
                                                <div class="fv-row mb-7">
                                                    <!--begin::Label-->
                                                    <label class="required fs-6 fw-semibold mb-2">Cevap (Türkçe)</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input type="text" class="form-control form-control-solid" placeholder="" name="answer[tr]" value="{{$customerFaq->getTranslation('answer', 'tr')}}" />
                                                    <!--end::Input-->
                                                </div>
                                                <div class="fv-row mb-7">
                                                    <!--begin::Label-->
                                                    <label class="required fs-6 fw-semibold mb-2">Cevap (İngilizce)</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input type="text" class="form-control form-control-solid" placeholder="" name="answer[en]" value="{{$customerFaq->getTranslation('answer', 'en')}}" />
                                                    <!--end::Input-->
                                                </div>
                                                <div class="fv-row mb-7">
                                                    <!--begin::Label-->
                                                    <label class="required fs-6 fw-semibold mb-2">Cevap (Almanca)</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input type="text" class="form-control form-control-solid" placeholder="" name="answer[de]" value="{{$customerFaq->getTranslation('answer', 'de')}}" />
                                                    <!--end::Input-->
                                                </div>

                                                <div class="fv-row mb-7">
                                                    <!--begin::Label-->
                                                    <label class="required fs-6 fw-semibold mb-2">Cevap (İspanyolca)</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input type="text" class="form-control form-control-solid" placeholder="" name="answer[es]" value="{{$customerFaq->getTranslation('answer', 'es')}}" />
                                                    <!--end::Input-->
                                                </div>

                                                <div class="fv-row mb-7">
                                                    <!--begin::Label-->
                                                    <label class="required fs-6 fw-semibold mb-2">Cevap (Fransızca)</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input type="text" class="form-control form-control-solid" placeholder="" name="answer[fr]" value="{{$customerFaq->getTranslation('answer', 'fr')}}" />
                                                    <!--end::Input-->
                                                </div>

                                                <div class="fv-row mb-7">
                                                    <!--begin::Label-->
                                                    <label class="required fs-6 fw-semibold mb-2">Cevap (İtalyanca)</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input type="text" class="form-control form-control-solid" placeholder="" name="answer[it]" value="{{$customerFaq->getTranslation('answer', 'it')}}" />
                                                    <!--end::Input-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Scroll-->
                                </div>
                                <!--end::Modal body-->
                        </div>

                    </div>
                    <!--end::Scroll-->

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
    </div>
@endsection
