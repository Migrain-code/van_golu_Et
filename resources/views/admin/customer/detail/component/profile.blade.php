<!--begin::Sidebar-->
<div class="flex-column flex-lg-row-auto w-100 w-xl-350px mb-10">
    <!--begin::Card-->
    <div class="card mb-5 mb-xl-8">
        <!--begin::Card body-->
        <div class="card-body pt-15">
            <!--begin::Summary-->
            <div class="d-flex flex-center flex-column mb-5">
                <!--begin::Avatar-->
                <div class="symbol symbol-150px symbol-circle mb-7">
                    <img src="{{image($customer->image)}}" alt="image" />
                </div>
                <!--end::Avatar-->
                <!--begin::Name-->
                <a href="#" class="fs-3 text-gray-800 text-hover-primary fw-bold mb-1">{{$customer->name}}</a>
                <!--end::Name-->
                <!--begin::Email-->
                <a href="tel:{{$customer->phone}}" class="fs-5 fw-semibold text-muted text-hover-primary mb-6">{{formatPhone($customer->phone)}}</a>
                <!--end::Email-->
            </div>
            <!--end::Summary-->
            @if($customer->type_id == 1)
                <!--begin::Details toggle-->
                <div class="d-flex flex-stack fs-4 py-3">
                    <div class="fw-bold">Detaylar</div>
                    <!--begin::Badge-->
                    <div class="badge badge-light-info d-inline">Bayi Kullanıcısı</div>
                    <!--begin::Badge-->
                </div>
            @endif

            <!--end::Details toggle-->
            <div class="separator separator-dashed my-3"></div>
            <!--begin::Details content-->
            <div class="pb-5 fs-6">
                <!--begin::Details item-->
                <div class="fw-bold mt-5">Hesap ID</div>
                <div class="text-gray-600">ID-{{$customer->id}}</div>
                <!--begin::Details item-->
                <!--begin::Details item-->
                <div class="fw-bold mt-5">Fatura Email</div>
                <div class="text-gray-600">
                    <a href="mailto:{{$customer->email}}" class="text-gray-600 text-hover-primary">{{$customer->email}}</a>
                </div>
                <!--begin::Details item-->
                <!--begin::Details item-->
                <div class="fw-bold mt-5">Address</div>
                <div class="text-gray-600">
                    <br />{{$customer->city->name}}
                    <br />{{$customer->district->name}}</div>
                <!--begin::Details item-->

                <div class="fw-bold mt-5">Sipariş Sayısı</div>
                <div class="text-gray-600">
                    <a href="#" class="text-gray-600 text-hover-primary">{{$customer->orders->count()}}</a>
                </div>
                <!--begin::Details item-->
            </div>
            <!--end::Details content-->
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Card-->
</div>
<!--end::Sidebar-->
