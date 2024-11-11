<!DOCTYPE html>

<html lang="en">
<!--begin::Head-->

<head>
    <title>{{setting('speed_site_title')." | "}}@yield('title', trans('Anasayfa'))</title>
    <meta name="description" content="@yield('description', trans(setting('speed_meta_descriptions')))">

    <meta charset="utf-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link href="{{image(setting('favicon'))}}" rel="shortcut icon">

    <!--begin::Fonts(mandatory for all pages)-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <link href="/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <style>
        #kt_body, #kt_app_root {
            min-height: 100vh;
        }

    </style>
</head>
<!--end::Head-->
<!--begin::Body-->
<body id="kt_body" class="app-blank app-blank">
<!--begin::Theme mode setup on page load-->
<script>var defaultThemeMode = "light"; var themeMode; if ( document.documentElement ) { if ( document.documentElement.hasAttribute("data-theme-mode")) { themeMode = document.documentElement.getAttribute("data-theme-mode"); } else { if ( localStorage.getItem("data-theme") !== null ) { themeMode = localStorage.getItem("data-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-theme", themeMode); }</script>


<div class="d-flex flex-column flex-root bg-dark" id="kt_app_root">
    <!--begin::Authentication - Sign-in -->
    <div class="d-flex flex-column flex-lg-row flex-column-fluid">
        <!--begin::Aside-->
        <div class="d-flex flex-column flex-column-fluid flex-center w-lg-50 p-10">
            <!--begin::Wrapper-->
            <div class="d-flex justify-content-between flex-column-fluid flex-column w-100 mw-450px">
                <!--begin::Header-->
                <div class="d-flex flex-stack py-2"></div>
                <!--end::Header-->

                    <!--begin::Form-->
                    <form class="form w-100 bg-white" style="border-radius: 15px;padding: 30px" novalidate="novalidate" id="kt_sign_in_form" data-kt-redirect-url="#" method="post" action="{{route('login')}}">
                        <img alt="Logo" src="{{image(setting('logo'))}}" class="h-25px" />
                        @csrf
                        <!--begin::Body-->
                        <div class="card-body">
                            <!--begin::Heading-->
                            <div class="text-start mb-10">
                                <!--begin::Title-->
                                <h1 class="text-dark mb-3 fs-3x" data-kt-translate="sign-in-title">Admin Panel</h1>
                                <!--end::Title-->
                                <!--begin::Text-->
                                <div class="text-gray-400 fw-semibold fs-6" data-kt-translate="general-desc">{{setting('speed_site_title')}} Yönetim Paneli</div>
                                <!--end::Link-->
                            </div>
                            <!--begin::Heading-->
                            <!--begin::Input group=-->
                            <div class="fv-row mb-8">
                                <!--begin::Email-->
                                <input type="text" placeholder="E-posta Adresiniz" name="email" value="" autocomplete="off" data-kt-translate="sign-in-input-email" class="form-control form-control-solid phone" />
                                <!--end::Email-->
                            </div>
                            <!--end::Input group=-->
                            <div class="fv-row mb-7">
                                <!--begin::Password-->
                                <input type="password" placeholder="Password" name="password" autocomplete="off" data-kt-translate="sign-in-input-password" value="" class="form-control form-control-solid" />
                                <!--end::Password-->
                            </div>
                            <!--end::Input group=-->
                            <!--begin::Actions-->
                            <div class="d-flex flex-stack">
                                <!--begin::Submit-->
                                <button id="kt_sign_in_submit" class="btn btn-primary me-2 flex-shrink-0 w-100">
                                    <!--begin::Indicator label-->
                                    <span class="indicator-label" data-kt-translate="sign-in-submit">Giriş Yap</span>
                                    <!--end::Indicator label-->
                                    <!--begin::Indicator progress-->
                                    <span class="indicator-progress">
												<span data-kt-translate="general-progress">Please wait...</span>
												<span class="spinner-border spinner-border-sm align-middle ms-2"></span>
											</span>
                                    <!--end::Indicator progress-->
                                </button>
                                <!--end::Submit-->

                            </div>
                            <!--end::Actions-->
                        </div>
                        <!--begin::Body-->
                    </form>
                    <!--end::Form-->
                <!--begin::Footer-->
                <div class="d-flex justify-content-center">
                    <img alt="Logo" src="{{image(setting('logo'))}}" class="theme-light-show h-25px" />
                </div>
                <!--end::Footer-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Aside-->

    </div>
    <!--end::Authentication - Sign-in-->
</div>
<!--end::Root-->
<!--begin::Javascript-->
<script>var csrf_token = '{{csrf_token()}}'</script>
<!--begin::Global Javascript Bundle(mandatory for all pages)-->
<script src="/assets/plugins/global/plugins.bundle.js"></script>
<script src="/assets/js/scripts.bundle.js"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Custom Javascript(used for this page only)-->
<script src="/assets/js/custom/authentication/sign-in/general.js"></script>

@include('admin.layouts.components.scripts')
<!--end::Javascript-->
</body>
<!--end::Body-->

</html>
