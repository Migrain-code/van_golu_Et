<!--begin::Navs-->
<ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold">
    <!--begin::Nav item-->
    <li class="nav-item mt-2">
        <a class="nav-link text-active-primary ms-0 me-10 py-5 @if(request()->routeIs('admin.business.edit')) active @endif" href="{{route('admin.business.edit', $business->id)}}">Hesap Özeti</a>
    </li>
    <!--end::Nav item-->
    <!--begin::Nav item-->
    <li class="nav-item mt-2">
        <a class="nav-link text-active-primary ms-0 me-10 py-5 @if(request()->routeIs('admin.business.settings')) active @endif" href="{{route('admin.business.settings', $business->id)}}">Ayarlar</a>
    </li>
    <!--end::Nav item-->
    <!--begin::Nav item-->
    <li class="nav-item mt-2">
        <a class="nav-link text-active-primary ms-0 me-10 py-5 @if(request()->routeIs('admin.businessService.*')) active @endif" href="{{route('admin.businessService.index')}}">Hizmetleri</a>
    </li>
    <!--end::Nav item-->
    <!--begin::Nav item-->
    <li class="nav-item mt-2">
        <a class="nav-link text-active-primary ms-0 me-10 py-5 @if(request()->routeIs('admin.business.edit')) activ @endif" href="security.html">Paket Satışları</a>
    </li>
    <!--end::Nav item-->
    <!--begin::Nav item-->
    <li class="nav-item mt-2">
        <a class="nav-link text-active-primary ms-0 me-10 py-5 @if(request()->routeIs('admin.business.edit')) activ @endif" href="billing.html">Ürün Satışları</a>
    </li>
    <!--end::Nav item-->
    <!--begin::Nav item-->
    <li class="nav-item mt-2">
        <a class="nav-link text-active-primary ms-0 me-10 py-5 @if(request()->routeIs('admin.business.edit')) activ @endif" href="logs.html">Ürünleri</a>
    </li>
    <!--end::Nav item-->

    <!--begin::Nav item-->
    <li class="nav-item mt-2">
        <a class="nav-link text-active-primary ms-0 me-10 py-5 @if(request()->routeIs('admin.business.edit')) activ @endif" href="statements.html">Müşterileri</a>
    </li>
    <!--end::Nav item-->
    <!--begin::Nav item-->
    <li class="nav-item mt-2">
        <a class="nav-link text-active-primary ms-0 me-10 py-5 @if(request()->routeIs('admin.business.edit')) activ @endif" href="referrals.html">Personelleri</a>
    </li>
    <!--end::Nav item-->
    <!--begin::Nav item-->
    <li class="nav-item mt-2">
        <a class="nav-link text-active-primary ms-0 me-10 py-5 @if(request()->routeIs('admin.business.edit')) activ @endif" href="api-keys.html">Ödemeleri</a>
    </li>
    <!--end::Nav item-->
    <!--begin::Nav item-->
    <li class="nav-item mt-2">
        <a class="nav-link text-active-primary ms-0 me-10 py-5 @if(request()->routeIs('admin.business.edit')) activ @endif" href="logs.html">Randevuları</a>
    </li>
    <!--end::Nav item-->

</ul>
<!--begin::Navs-->
