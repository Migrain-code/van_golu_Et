<div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true" data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="225px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
    <!--begin::Logo-->
    <div class="app-sidebar-logo px-6" id="kt_app_sidebar_logo">
        <!--begin::Logo image-->
        <a href="{{route('admin.home')}}">
            <img alt="Logo" src="{{image(setting('logo'))}}" class="w-150px h-45px app-sidebar-logo-default" />
            <img alt="Logo" src="{{image(setting('logo'))}}" class="w-150px h-45px app-sidebar-logo-minimize" />
        </a>
        <!--end::Logo image-->
        <!--begin::Sidebar toggle-->
        <div id="kt_app_sidebar_toggle" class="app-sidebar-toggle btn btn-icon btn-shadow btn-sm btn-color-muted btn-active-color-primary body-bg h-30px w-30px position-absolute top-50 start-100 translate-middle rotate" data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body" data-kt-toggle-name="app-sidebar-minimize">
            <!--begin::Svg Icon | path: icons/duotune/arrows/arr079.svg-->
            <span class="svg-icon svg-icon-2 rotate-180">
									<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path opacity="0.5" d="M14.2657 11.4343L18.45 7.25C18.8642 6.83579 18.8642 6.16421 18.45 5.75C18.0358 5.33579 17.3642 5.33579 16.95 5.75L11.4071 11.2929C11.0166 11.6834 11.0166 12.3166 11.4071 12.7071L16.95 18.25C17.3642 18.6642 18.0358 18.6642 18.45 18.25C18.8642 17.8358 18.8642 17.1642 18.45 16.75L14.2657 12.5657C13.9533 12.2533 13.9533 11.7467 14.2657 11.4343Z" fill="currentColor" />
										<path d="M8.2657 11.4343L12.45 7.25C12.8642 6.83579 12.8642 6.16421 12.45 5.75C12.0358 5.33579 11.3642 5.33579 10.95 5.75L5.40712 11.2929C5.01659 11.6834 5.01659 12.3166 5.40712 12.7071L10.95 18.25C11.3642 18.6642 12.0358 18.6642 12.45 18.25C12.8642 17.8358 12.8642 17.1642 12.45 16.75L8.2657 12.5657C7.95328 12.2533 7.95328 11.7467 8.2657 11.4343Z" fill="currentColor" />
									</svg>
								</span>
            <!--end::Svg Icon-->
        </div>
        <!--end::Sidebar toggle-->
    </div>
    <!--end::Logo-->
    <!--begin::sidebar menu-->
    <div class="app-sidebar-menu overflow-hidden flex-column-fluid">
        <!--begin::Menu wrapper-->
        <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper hover-scroll-overlay-y my-5" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer" data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px" data-kt-scroll-save-state="true">
            <!--begin::Menu-->
            <div class="menu menu-column menu-rounded menu-sub-indention px-3" id="#kt_app_sidebar_menu" data-kt-menu="true" data-kt-menu-expand="false">
                <!--begin:Menu item-->
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a class="menu-link" href="{{route('admin.home')}}">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/coding/cod003.svg-->
                            <span class="svg-icon svg-icon-2">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M13.0021 10.9128V3.01281C13.0021 2.41281 13.5021 1.91281 14.1021 2.01281C16.1021 2.21281 17.9021 3.11284 19.3021 4.61284C20.7021 6.01284 21.6021 7.91285 21.9021 9.81285C22.0021 10.4129 21.5021 10.9128 20.9021 10.9128H13.0021Z" fill="currentColor"></path>
                                    <path opacity="0.3" d="M11.0021 13.7128V4.91283C11.0021 4.31283 10.5021 3.81283 9.90208 3.91283C5.40208 4.51283 1.90209 8.41284 2.00209 13.1128C2.10209 18.0128 6.40208 22.0128 11.3021 21.9128C13.1021 21.8128 14.7021 21.3128 16.0021 20.4128C16.5021 20.1128 16.6021 19.3128 16.1021 18.9128L11.0021 13.7128Z" fill="currentColor"></path>
                                    <path opacity="0.3" d="M21.9021 14.0128C21.7021 15.6128 21.1021 17.1128 20.1021 18.4128C19.7021 18.9128 19.0021 18.9128 18.6021 18.5128L13.0021 12.9128H20.9021C21.5021 12.9128 22.0021 13.4128 21.9021 14.0128Z" fill="currentColor"></path>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title">DashBoard</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->
                <!--begin:Menu item-->
                <div class="menu-item pt-5">
                    <!--begin:Menu content-->
                    <div class="menu-content">
                        <span class="menu-heading fw-bold text-uppercase fs-7">Pages</span>
                    </div>
                    <!--end:Menu content-->
                </div>
                <!--end:Menu item-->
                <!--begin:Menu Bloglar-->
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion @if(request()->routeIs('admin.blog.*') || request()->routeIs('admin.blog-category.*') || request()->routeIs('admin.blog-comment.*')) hover show @endif">
                    <!--begin:Menu Müşteriler-->
                    <span class="menu-link">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/communication/com005.svg-->
                            <i class="bi bi-blockquote-left"></i>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title">Blog Ayarları</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <!--end:Menu link-->
                    <!--begin:Menu Müşteriler-->
                    <div class="menu-sub menu-sub-accordion">
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link @if(request()->routeIs('admin.blog.*')) active @endif" href="{{route('admin.blog.index')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Bloglar</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link @if(request()->routeIs('admin.blog-category.*')) active @endif" href="{{route('admin.blog-category.index')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Blog Kategorileri</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link @if(request()->routeIs('admin.blog-comment.*')) active @endif" href="{{route('admin.blog-comment.index')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Blog Yorumları</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                    </div>
                    <!--end:Menu Müşteriler-->


                </div>
                <!--end:Menu item-->
                <!--begin:Menu Hakkımızda-->
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion @if(request()->routeIs('admin.about.*') || request()->routeIs('admin.about.*') || request()->routeIs('admin.about-gallery.*')|| request()->routeIs('admin.downloadable-content.*')) hover show @endif">
                    <!--begin:Menu Müşteriler-->
                    <span class="menu-link">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/communication/com005.svg-->
                            <i class="bi bi-blockquote-left"></i>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title">Hakkımızda</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <!--end:Menu link-->
                    <!--begin:Menu Müşteriler-->
                    <div class="menu-sub menu-sub-accordion">
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link @if(request()->routeIs('admin.about.*')) active @endif" href="{{route('admin.about.index')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Hakkımızda Ayarları</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                        <!--begin:Menu item-->
                        <div class="menu-item ">
                            <!--begin:Menu link-->
                            <a class="menu-link @if(request()->routeIs('admin.about-gallery.*')) active @endif" href="{{route('admin.about-gallery.index')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Hakkımızda Görselleri</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                        <!--begin:Menu item-->
                        <div class="menu-item ">
                            <!--begin:Menu link-->
                            <a class="menu-link @if(request()->routeIs('admin.downloadable-content.*')) active @endif" href="{{route('admin.downloadable-content.index')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">İndirilebilir İçerikler</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                    </div>
                    <!--end:Menu Müşteriler-->


                </div>
                <!--end:Menu Hakkımızda-->
                <!--begin:Menu Kategoriler-->
                <div data-kt-menu-trigger="click"
                     class="menu-item menu-accordion
                     @if(request()->routeIs('admin.category.*') ||
                        request()->routeIs('admin.subcategory.*')
                        || request()->routeIs('admin.subCategorySon.*') ||
                         request()->routeIs('admin.series.*')||
                         request()->routeIs('admin.reference-category.*')||
                         request()->routeIs('admin.productionCategory.*')) hover show @endif">
                    <!--begin:Menu Müşteriler-->
                    <span class="menu-link">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/communication/com005.svg-->
                            <span class="svg-icon svg-icon-2">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect x="2" y="2" width="9" height="9" rx="2" fill="currentColor"></rect>
                                    <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="currentColor"></rect>
                                    <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="currentColor"></rect>
                                    <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="currentColor"></rect>
                                </svg>
							</span>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title">Kategoriler</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <!--end:Menu link-->
                    <!--begin:Menu Müşteriler-->
                    <div class="menu-sub menu-sub-accordion">
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link" href="{{route('admin.category.index')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Ana Kategoriler</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->

                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link @if(request()->routeIs('admin.series.*')) active @endif" href="{{route('admin.series.index')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Ürün Grupları</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                    </div>
                    <!--end:Menu Müşteriler-->


                </div>
                <!--end:Menu Kategoriler-->

                <!--end:Menu item-->
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a class="menu-link @if(request()->routeIs('admin.settings.*')) active @endif" href="{{route('admin.settings.customer')}}">
                        <span class="menu-icon">
                            <i class="bi bi-gear"></i>
                        </span>
                        <span class="menu-title">Site Ayarları</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a class="menu-link @if(request()->routeIs('admin.slider.*')) active @endif" href="{{route('admin.slider.index')}}">
                        <span class="menu-icon">
                            <i class="bi bi-sliders"></i>
                        </span>
                        <span class="menu-title">Sliderlar</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a class="menu-link @if(request()->routeIs('admin.main-page.*')) active @endif" href="{{route('admin.main-page.index')}}">
                        <span class="menu-icon">
                            <i class="fa fa-home"></i>
                        </span>
                        <span class="menu-title">Anasayfa Bölümleri</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a class="menu-link @if(request()->routeIs('admin.product.*')) active @endif" href="{{route('admin.product.index')}}">
                        <span class="menu-icon">
                            <i class="fa fa-ticket"></i>
                        </span>
                        <span class="menu-title">Ürünler</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a class="menu-link @if(request()->routeIs('admin.reference.*')) active @endif" href="{{route('admin.reference.index')}}">
                        <span class="menu-icon">
                            <i class="fa fa-toolbox"></i>
                        </span>
                        <span class="menu-title">Referanslar</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a class="menu-link @if(request()->routeIs('admin.team.*')) active @endif" href="{{route('admin.team.index')}}">
                        <span class="menu-icon">
                            <i class="fa fa-user-group"></i>
                        </span>
                        <span class="menu-title">Yönetim Kurulu</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a class="menu-link @if(request()->routeIs('admin.video.*')) active @endif" href="{{route('admin.video.index')}}">
                        <span class="menu-icon">
                            <i class="fa fa-video"></i>
                        </span>
                        <span class="menu-title">Videolar</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a class="menu-link @if(request()->routeIs('admin.newspaper.*')) active @endif" href="{{route('admin.newspaper.index')}}">
                        <span class="menu-icon">
                            <i class="fa fa-newspaper"></i>
                        </span>
                        <span class="menu-title">Basında Biz</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a class="menu-link @if(request()->routeIs('admin.contact-request.*')) active @endif" href="{{route('admin.contact-request.index')}}">
                        <span class="menu-icon">
                            <i class="fa fa-message"></i>
                        </span>
                        <span class="menu-title justify-content-between">
                            İletişim Talepleri
                            <span class="badge badge-circle badge-danger">{{auth('admin')->user()->contactRequestCount()}}</span>
                        </span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a class="menu-link @if(request()->routeIs('admin.jobRequestForm.*')) active @endif" href="{{route('admin.jobRequestForm.index')}}">
                        <span class="menu-icon">
                            <i class="fa fa-paperclip"></i>
                        </span>
                        <span class="menu-title justify-content-between">
                            İş Başvuru Formları
                            <span class="badge badge-circle badge-danger">{{auth('admin')->user()->jobRequestCount()}}</span>
                        </span>
                    </a>
                    <!--end:Menu link-->
                </div>
            <!--end::Menu-->
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a class="menu-link @if(request()->routeIs('admin.kvkk.*')) active @endif" href="{{route('admin.kvkk.index')}}">
                        <span class="menu-icon">
                            <i class="fa fa-paperclip"></i>
                        </span>
                        <span class="menu-title">
                            Kvkk Metni
                        </span>
                    </a>
                    <!--end:Menu link-->
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link @if(request()->routeIs('admin.language.*')) active @endif" href="{{route('admin.language.index')}}">
                        <span class="menu-icon">
                            <i class="fa fa-language"></i>
                        </span>
                            <span class="menu-title">Dil Ayarları</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                </div>
                <!--end::Menu-->
        </div>

        <!--end::Menu wrapper-->
    </div>
    <!--end::sidebar menu-->
    <!--begin::Footer-->
    <div class="app-sidebar-footer flex-column-auto pt-2 pb-6 px-6" id="kt_app_sidebar_footer">
        <form method="post" id="logout-form" action="{{route('logout')}}">
            @csrf
            <button type="submit" class="btn btn-flex flex-center btn-custom btn-primary overflow-hidden text-nowrap px-0 h-40px w-100" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss-="click" title="Güvenli Çıkış Yap">
                <span class="btn-label">Çıkış Yap</span>
                <!--begin::Svg Icon | path: icons/duotune/general/gen005.svg-->
                <span class="svg-icon btn-icon svg-icon-2 m-0">
									<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path opacity="0.3" d="M19 22H5C4.4 22 4 21.6 4 21V3C4 2.4 4.4 2 5 2H14L20 8V21C20 21.6 19.6 22 19 22ZM12.5 18C12.5 17.4 12.6 17.5 12 17.5H8.5C7.9 17.5 8 17.4 8 18C8 18.6 7.9 18.5 8.5 18.5L12 18C12.6 18 12.5 18.6 12.5 18ZM16.5 13C16.5 12.4 16.6 12.5 16 12.5H8.5C7.9 12.5 8 12.4 8 13C8 13.6 7.9 13.5 8.5 13.5H15.5C16.1 13.5 16.5 13.6 16.5 13ZM12.5 8C12.5 7.4 12.6 7.5 12 7.5H8C7.4 7.5 7.5 7.4 7.5 8C7.5 8.6 7.4 8.5 8 8.5H12C12.6 8.5 12.5 8.6 12.5 8Z" fill="currentColor" />
										<rect x="7" y="17" width="6" height="2" rx="1" fill="currentColor" />
										<rect x="7" y="12" width="10" height="2" rx="1" fill="currentColor" />
										<rect x="7" y="7" width="6" height="2" rx="1" fill="currentColor" />
										<path d="M15 8H20L14 2V7C14 7.6 14.4 8 15 8Z" fill="currentColor" />
									</svg>
								</span>
                <!--end::Svg Icon-->
            </button>
        </form>
    </div>
    <!--end::Footer-->
</div>
</div>
