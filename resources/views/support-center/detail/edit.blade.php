@extends('layouts.master')
@section('title', 'Talep Detayı')
@section('styles')

@endsection
@section('breadcrumb')
    <!--begin::Title-->
    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Talep Detayı</h1>
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
            <a href="{{route('admin.supportRequest.index')}}" class="text-muted text-hover-primary">Destek Talepleri</a>
        </li>
        <!--end::Item-->
        <!--begin::Item-->
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-400 w-5px h-2px"></span>
        </li>

        <li class="breadcrumb-item text-muted">
            Talep Detayı
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
                <div class="card-title">Talep detayı</div>

            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body pt-0">
                <div class="flex-lg-row-fluid ms-lg-7 ms-xl-10">
                    <!--begin::Card-->
                    <div class="card">
                        <div class="card-header align-items-center py-5 gap-5">
                            <!--begin::Actions-->
                            <div class="d-flex">
                                <!--begin::Back-->
                                <a href="{{route('admin.supportRequest.index')}}" class="btn btn-sm btn-icon btn-clear btn-active-light-primary me-3" data-bs-toggle="tooltip" data-bs-placement="top" title="Back">
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr063.svg-->
                                    <span class="svg-icon svg-icon-1 m-0">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect opacity="0.5" x="6" y="11" width="13" height="2" rx="1" fill="currentColor" />
                                            <path d="M8.56569 11.4343L12.75 7.25C13.1642 6.83579 13.1642 6.16421 12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75L5.70711 11.2929C5.31658 11.6834 5.31658 12.3166 5.70711 12.7071L11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25C13.1642 17.8358 13.1642 17.1642 12.75 16.75L8.56569 12.5657C8.25327 12.2533 8.25327 11.7467 8.56569 11.4343Z" fill="currentColor" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </a>
                                <!--end::Back-->

                                <!--begin::Delete-->
                                <a href="#" class="btn btn-sm btn-icon btn-light btn-active-light-primary me-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
                                    <span class="svg-icon svg-icon-2 m-0">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor" />
                                            <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor" />
                                            <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </a>
                                <!--end::Delete-->
                                <!--begin::Mark as read-->
                                <a href="#" class="btn btn-sm btn-icon btn-light btn-active-light-primary me-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Mark as read">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen028.svg-->
                                    <span class="svg-icon svg-icon-2 m-0">
																<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																	<rect opacity="0.5" x="7" y="2" width="14" height="16" rx="3" fill="currentColor" />
																	<rect x="3" y="6" width="14" height="16" rx="3" fill="currentColor" />
																</svg>
															</span>
                                    <!--end::Svg Icon-->
                                </a>
                                <!--end::Mark as read-->
                                <!--begin::Move-->
                                <a href="#" class="btn btn-sm btn-icon btn-light btn-active-light-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="İşletmeyi Göster">
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr076.svg-->
                                    <span class="svg-icon svg-icon-2 m-0">
																<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																	<rect opacity="0.3" width="12" height="2" rx="1" transform="matrix(-1 0 0 1 15.5 11)" fill="currentColor" />
																	<path d="M13.6313 11.6927L11.8756 10.2297C11.4054 9.83785 11.3732 9.12683 11.806 8.69401C12.1957 8.3043 12.8216 8.28591 13.2336 8.65206L16.1592 11.2526C16.6067 11.6504 16.6067 12.3496 16.1592 12.7474L13.2336 15.3479C12.8216 15.7141 12.1957 15.6957 11.806 15.306C11.3732 14.8732 11.4054 14.1621 11.8756 13.7703L13.6313 12.3073C13.8232 12.1474 13.8232 11.8526 13.6313 11.6927Z" fill="currentColor" />
																	<path d="M8 5V6C8 6.55228 8.44772 7 9 7C9.55228 7 10 6.55228 10 6C10 5.44772 10.4477 5 11 5H18C18.5523 5 19 5.44772 19 6V18C19 18.5523 18.5523 19 18 19H11C10.4477 19 10 18.5523 10 18C10 17.4477 9.55228 17 9 17C8.44772 17 8 17.4477 8 18V19C8 20.1046 8.89543 21 10 21H19C20.1046 21 21 20.1046 21 19V5C21 3.89543 20.1046 3 19 3H10C8.89543 3 8 3.89543 8 5Z" fill="currentColor" />
																</svg>
															</span>
                                    <!--end::Svg Icon-->
                                </a>
                                <!--end::Move-->
                            </div>
                            <!--end::Actions-->
                            <!--begin::Pagination-->
                            <div class="d-flex align-items-center">
                                <!--begin::Print-->
                                <a href="#" class="btn btn-sm btn-icon btn-light btn-active-light-primary me-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Print">
                                    <i class="bi bi-printer-fill fs-2"></i>
                                </a>
                                <!--end::Print-->
                            </div>
                            <!--end::Pagination-->
                        </div>
                        <div class="card-body">
                            <!--begin::Title-->
                            <div class="d-flex flex-wrap gap-2 justify-content-between mb-8">


                            </div>
                            <!--end::Title-->
                            @foreach($supportRequest->responses as $response)
                                <!--begin::Message accordion-->
                                <div data-kt-inbox-message="message_wrapper">
                                    <!--begin::Message header-->
                                    <div class="d-flex flex-wrap gap-2 flex-stack cursor-pointer" data-kt-inbox-message="header">
                                        <!--begin::Author-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Avatar-->
                                            <div class="symbol symbol-50 me-4">
                                                <span class="symbol-label" style="background-image:url(/assets/media/avatars/300-6.jpg);"></span>
                                            </div>
                                            <!--end::Avatar-->
                                            <div class="pe-5">
                                                <!--begin::Author details-->
                                                <div class="d-flex align-items-center flex-wrap gap-1">
                                                    <a href="{{route('admin.business.edit',1)}}" class="fw-bold text-dark text-hover-primary">{{$supportRequest->user->name}}</a>
                                                    <!--begin::Svg Icon | path: icons/duotune/abstract/abs050.svg-->
                                                    <span class="svg-icon svg-icon-7 svg-icon-success mx-3">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <circle fill="currentColor" cx="12" cy="12" r="8" />
                                                    </svg>
                                                </span>
                                                    <!--end::Svg Icon-->
                                                    <span class="text-muted fw-bold">{{$supportRequest->created_at->diffForHumans()}}</span>
                                                </div>
                                                <!--end::Author details-->
                                                <!--begin::Message details-->
                                                <div data-kt-inbox-message="details">
                                                    <div class="d-flex align-items-center flex-wrap gap-2">
                                                        <!--begin::Badges-->
                                                        @if($supportRequest->status == 0)
                                                            <span class="badge badge-light-danger my-1 me-2">Cevaplanmadı</span>
                                                        @else
                                                            <span class="badge badge-light-success my-1">Cevaplandı</span>
                                                        @endif
                                                        <!--end::Badges-->
                                                    </div>
                                                    <!--begin::Menu toggle-->

                                                </div>
                                                <!--end::Message details-->
                                                <!--begin::Preview message-->
                                                <div class="text-muted fw-semibold mw-450px d-none" data-kt-inbox-message="preview">
                                                    @if($supportRequest->status == 0)
                                                        <span class="badge badge-light-danger my-1 me-2">Cevaplanmadı</span>
                                                    @else
                                                        <span class="badge badge-light-success my-1">Cevaplandı</span>
                                                    @endif
                                                </div>
                                                <!--end::Preview message-->
                                            </div>
                                        </div>
                                        <!--end::Author-->
                                        <!--begin::Actions-->
                                        <div class="d-flex align-items-center flex-wrap gap-2">
                                            <!--begin::Date-->
                                            <span class="fw-semibold text-muted text-end me-3">{{$response->created_at->format('d.m.Y, H:i:s')}}</span>
                                            <!--end::Date-->

                                        </div>
                                        <!--end::Actions-->
                                    </div>
                                    <!--end::Message header-->
                                    <!--begin::Message content-->
                                    <div class="collapse fade show" data-kt-inbox-message="message">
                                        <div class="py-3">
                                            {!! $response->question !!}
                                        </div>
                                        <div class="py-2">
                                            <form id="kt_inbox_reply_form" class="rounded border mt-10">
                                                <!--begin::Body-->
                                                <div class="d-block">
                                                    <!--begin::Message-->
                                                    <div id="kt_inbox_form_editor" class="border-0 h-250px px-3"></div>
                                                    <!--end::Message-->
                                                    <!--begin::Attachments-->
                                                    <div class="dropzone dropzone-queue px-8 py-4" id="kt_inbox_reply_attachments" data-kt-inbox-form="dropzone">
                                                        <div class="dropzone-items">
                                                            <div class="dropzone-item" style="display:none">
                                                                <!--begin::Dropzone filename-->
                                                                <div class="dropzone-file">
                                                                    <div class="dropzone-filename" title="some_image_file_name.jpg">
                                                                        <span data-dz-name="">some_image_file_name.jpg</span>
                                                                        <strong>(
                                                                            <span data-dz-size="">340kb</span>)</strong>
                                                                    </div>
                                                                    <div class="dropzone-error" data-dz-errormessage=""></div>
                                                                </div>
                                                                <!--end::Dropzone filename-->
                                                                <!--begin::Dropzone progress-->
                                                                <div class="dropzone-progress">
                                                                    <div class="progress">
                                                                        <div class="progress-bar bg-primary" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0" data-dz-uploadprogress=""></div>
                                                                    </div>
                                                                </div>
                                                                <!--end::Dropzone progress-->
                                                                <!--begin::Dropzone toolbar-->
                                                                <div class="dropzone-toolbar">
																			<span class="dropzone-delete" data-dz-remove="">
																				<i class="bi bi-x fs-1"></i>
																			</span>
                                                                </div>
                                                                <!--end::Dropzone toolbar-->
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--end::Attachments-->
                                                </div>
                                                <!--end::Body-->
                                                <!--begin::Footer-->
                                                <div class="d-flex flex-stack flex-wrap gap-2 py-5 ps-8 pe-5 border-top">
                                                    <!--begin::Actions-->
                                                    <div class="d-flex align-items-center me-3">
                                                        <!--begin::Send-->
                                                        <div class="btn-group me-4">
                                                            <!--begin::Submit-->
                                                            <span class="btn btn-primary fs-bold px-6" data-kt-inbox-form="send">
																		<span class="indicator-label">Send</span>
																		<span class="indicator-progress">Please wait...
																		<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
																	</span>
                                                            <!--end::Submit-->
                                                            <!--begin::Send options-->
                                                            <span class="btn btn-primary btn-icon fs-bold" role="button">
																		<span class="btn btn-icon" data-kt-menu-trigger="click" data-kt-menu-placement="top-start">
																			<!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
																			<span class="svg-icon svg-icon-2 m-0">
																				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																					<path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
																				</svg>
																			</span>
                                                                            <!--end::Svg Icon-->
																		</span>
                                                                <!--end::Menu-->
																	</span>
                                                            <!--end::Send options-->
                                                        </div>
                                                        <!--end::Send-->
                                                        <!--begin::Upload attachement-->
                                                        <span class="btn btn-icon btn-sm btn-clean btn-active-light-primary me-2" id="kt_inbox_reply_attachments_select" data-kt-inbox-form="dropzone_upload">
																	<!--begin::Svg Icon | path: icons/duotune/communication/com008.svg-->
																	<span class="svg-icon svg-icon-2 m-0">
																		<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																			<path opacity="0.3" d="M4.425 20.525C2.525 18.625 2.525 15.525 4.425 13.525L14.825 3.125C16.325 1.625 18.825 1.625 20.425 3.125C20.825 3.525 20.825 4.12502 20.425 4.52502C20.025 4.92502 19.425 4.92502 19.025 4.52502C18.225 3.72502 17.025 3.72502 16.225 4.52502L5.82499 14.925C4.62499 16.125 4.62499 17.925 5.82499 19.125C7.02499 20.325 8.82501 20.325 10.025 19.125L18.425 10.725C18.825 10.325 19.425 10.325 19.825 10.725C20.225 11.125 20.225 11.725 19.825 12.125L11.425 20.525C9.525 22.425 6.425 22.425 4.425 20.525Z" fill="currentColor" />
																			<path d="M9.32499 15.625C8.12499 14.425 8.12499 12.625 9.32499 11.425L14.225 6.52498C14.625 6.12498 15.225 6.12498 15.625 6.52498C16.025 6.92498 16.025 7.525 15.625 7.925L10.725 12.8249C10.325 13.2249 10.325 13.8249 10.725 14.2249C11.125 14.6249 11.725 14.6249 12.125 14.2249L19.125 7.22493C19.525 6.82493 19.725 6.425 19.725 5.925C19.725 5.325 19.525 4.825 19.125 4.425C18.725 4.025 18.725 3.42498 19.125 3.02498C19.525 2.62498 20.125 2.62498 20.525 3.02498C21.325 3.82498 21.725 4.825 21.725 5.925C21.725 6.925 21.325 7.82498 20.525 8.52498L13.525 15.525C12.325 16.725 10.525 16.725 9.32499 15.625Z" fill="currentColor" />
																		</svg>
																	</span>
                                                            <!--end::Svg Icon-->
																</span>
                                                        <!--end::Upload attachement-->
                                                        <!--begin::Pin-->
                                                        <span class="btn btn-icon btn-sm btn-clean btn-active-light-primary">
																	<!--begin::Svg Icon | path: icons/duotune/general/gen018.svg-->
																	<span class="svg-icon svg-icon-2 m-0">
																		<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																			<path opacity="0.3" d="M18.0624 15.3453L13.1624 20.7453C12.5624 21.4453 11.5624 21.4453 10.9624 20.7453L6.06242 15.3453C4.56242 13.6453 3.76242 11.4453 4.06242 8.94534C4.56242 5.34534 7.46242 2.44534 11.0624 2.04534C15.8624 1.54534 19.9624 5.24534 19.9624 9.94534C20.0624 12.0453 19.2624 13.9453 18.0624 15.3453Z" fill="currentColor" />
																			<path d="M12.0624 13.0453C13.7193 13.0453 15.0624 11.7022 15.0624 10.0453C15.0624 8.38849 13.7193 7.04535 12.0624 7.04535C10.4056 7.04535 9.06241 8.38849 9.06241 10.0453C9.06241 11.7022 10.4056 13.0453 12.0624 13.0453Z" fill="currentColor" />
																		</svg>
																	</span>
                                                            <!--end::Svg Icon-->
																</span>
                                                        <!--end::Pin-->
                                                    </div>
                                                    <!--end::Actions-->
                                                    <!--begin::Toolbar-->
                                                    <div class="d-flex align-items-center">
                                                        <!--begin::Dismiss reply-->
                                                        <span class="btn btn-icon btn-sm btn-clean btn-active-light-primary" data-inbox="dismiss" data-toggle="tooltip" title="Dismiss reply">

                                                        </span>
                                                        <!--end::Dismiss reply-->
                                                    </div>
                                                    <!--end::Toolbar-->
                                                </div>
                                                <!--end::Footer-->
                                            </form>
                                        </div>
                                    </div>
                                    <!--end::Message content-->
                                </div>
                                <!--end::Message accordion-->
                                <div class="separator my-6"></div>
                            @endforeach

                        </div>
                    </div>
                    <!--end::Card-->
                </div>

            </div>
            <!--end::Card body-->
        </div>


    </div>

@endsection

@section('scripts')
    <script>
        var hostUrl = '{{asset("/")}}'
    </script>
    <script src="/assets/js/project/support-center/detail/reply.js"></script>
    <script>

    </script>
@endsection
