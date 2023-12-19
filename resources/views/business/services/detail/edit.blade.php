@extends('layouts.master')
@section('title', 'İşletme Hizmet Listesi')
@section('styles')
    <style>


        /* Select2 dropdown menüsü için z-index değerini daha fazla artır */
        .select2-container--open {
            z-index: 1060; /* Örnek bir değer, gerektiğinde ayarlayabilirsiniz */
        }
    </style>
@endsection
@section('content')
    <div id="kt_app_content_container" class="app-container container-xxl">
        @include('business.detail.layouts.header')
        <div class="card mb-5 mb-xl-10">
            <!--begin::Card header-->
            <div class="card-header border-0 cursor-pointer">
                <!--begin::Card title-->
                <div class="card-title m-0">
                    <h3 class="fw-bold m-0">İşletme Hizmeti Güncelle</h3>
                </div>
                <!--end::Card title-->
            </div>
            <!--begin::Service Table-->
            <div class="card-body pt-0">
                <form class="row mb-6" method="post" action="{{route('admin.businessService.update', $businessService->id)}}">
                    @csrf
                    @method('PUT')
                    <!--begin::Label-->
                    {{--
                        <div class="form-group fv-row my-2">
                        <label class="col-form-label fw-semibold fs-6">
                            <span class="required">Hizmet Kategorisi</span>
                            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Hizmet Kategorisi vereceği hizmeti temsil eden kategoridir"></i>
                        </label>
                        <div class="fv-row">
                            <select name="category_id" aria-label="Hizmet Kategorisi Seçiniz" data-placeholder="Hizmet Kategorisi Seçiniz..."  data-control="select2"  class="form-select form-select-solid form-select-lg fw-semibold">
                                <option value="">Hizmet Kategorisi Seçiniz...</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}" @selected($businessService->category == $category->id)>{{$category->getName()}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                     --}}
                    <input type="hidden" name="category_id" value="{{$businessService->category}}">
                    <div class="form-group fv-row my-2">
                        <label class="col-form-label fw-semibold fs-6">
                            <span class="required">Hizmet Seçiniz</span>
                            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Hizmet Kategorisi vereceği hizmeti temsil eden kategoridir"></i>
                        </label>
                        <div class="fv-row">
                            <select name="sub_category_id" aria-label="Hizmet Seçiniz" data-placeholder="Hizmet Seçiniz..."  data-control="select2"  class="form-select form-select-solid form-select-lg fw-semibold">
                                <option value="">Hizmet Seçiniz...</option>
                                @foreach($businessService->categorys->subCategories as $serviceSubCategory)
                                    <option value="{{$serviceSubCategory->id}}" @selected($serviceSubCategory->id == $businessService->sub_category)> {{$serviceSubCategory->getName()}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group fv-row my-2">
                        <label class="col-form-label fw-semibold fs-6">
                            <span class="required">Hizmet Cinsiyeti</span>
                            <i class="fas fa-exclamation-circle ms-1 fs-7"
                               data-bs-toggle="tooltip"
                               title="İşletmenizin hizmer verdiği tür kadın ise sadece
                                   kadınlara hizmet seçeneği verir erkek ise aynı şekilde
                                   ama iki cinsiyete hizmet veriyorsanız her iki cinsiyete
                                   istediğiniz türden ekleyebilirsiniz.
                                   Eğer kadın erkek seçeneğiniz seçerseniz seçtiğini hizmet her iki cinsiyette de eklenir"></i>
                        </label>
                        <div class="fv-row">
                            <select name="type_id" aria-label="Cinsiyet Seçiniz" data-placeholder="Cinsiyet Seçiniz..."  data-control="select2"  class="form-select form-select-solid form-select-lg fw-semibold">
                                <option value="">Cinsiyet Seçiniz...</option>
                                @if($business->type_id == 3)
                                    @foreach($businessTypes as $type)
                                        @if($type->id != 3)
                                            <option value="{{$type->id}}" @selected($businessService->type == $type->id)>{{$type->name}}</option>
                                        @endif
                                    @endforeach
                                @else
                                    <option value="{{$business->type->id}}" selected>{{$business->type->name}}</option>
                                @endif
                            </select>
                        </div>
                    </div>

                    <div class="form-group fv-row my-2">
                        <label class="col-form-label fw-semibold fs-6">
                            <span class="required">Hizmet Fiyatı</span>
                            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Randevularınızda Hizmete Ödenecek Ücreti Temsil Eder"></i>
                        </label>
                        <input name="price" class="form-control form-control-lg form-control-solid" value="{{$businessService->price}}" />

                    </div>
                    <div class="form-group fv-row my-2">
                        <label class="col-form-label fw-semibold fs-6">
                            <span class="required">Süre</span>
                            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Bu Hizmet Kaç Dakika Sürecek. Randevu aldığınızda bu hizmet seçilirse hizmetin süresi randevu aralığına eklenir"></i>
                        </label>
                        <div class="fv-row">
                            <select name="time" aria-label="Süre Seçiniz" data-placeholder="Süre Seçiniz..."  data-control="select2"  class="form-select form-select-solid form-select-lg fw-semibold">
                                <option value="">Süre Seçiniz...</option>
                                @for($i = 5; $i <= 120; $i+=5)
                                    <option value="{{$i}}" @selected($businessService->time == $i)>{{$i. " Dakika"}}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    <input type="hidden" name="business_id" value="{{$business->id}}">

                    <button type="submit" style="max-width: 350px;margin: 0px auto" id="kt_modal_add_customer_submit" class="btn btn-primary mt-2">
                        <span class="indicator-label">Güncelle</span>
                        <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>

                </form>
            </div>

        </div>
    </div>

@endsection

@section('scripts')
    <script>
        $(document).on('change', '[name="category_id"]', function () {

            let service_category_id = $(this).val();
            var sub_category = $('[name="sub_category_id"]');
            sub_category.empty();
            $.ajax({
                url: '{{route('admin.businessService.serviceGet')}}',
                type: "POST",
                data: {
                    "_token": csrf_token,
                    'service_category_id': service_category_id,
                },
                dataType: "JSON",
                success: function (res) {
                    sub_category.append('<option value="">Hizmet Seçiniz</option>');

                    $.each(res, function (index, item) {
                        sub_category.append('<option value="' + item.id + '">' + item.name.{{\Illuminate\Support\Facades\App::getLocale()}} + '</option>');
                    });
                }
            });
        });
    </script>

@endsection
