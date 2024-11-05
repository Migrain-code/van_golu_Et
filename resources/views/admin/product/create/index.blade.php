@extends('admin.layouts.master')
@section('title', 'Ürün Oluştur')
@section('styles')

@endsection
@section('breadcrumb')
    <!--begin::Title-->
    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Ürün Oluştur</h1>
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
            <a href="{{route('admin.home')}}">Dashboard</a>
        </li>
        <!--end::Item-->
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-400 w-5px h-2px"></span>
        </li>
        <!--end::Item-->
        <!--begin::Item-->
        <li class="breadcrumb-item text-muted">
            <a href="{{route('admin.product.index')}}">Ürünler</a>
        </li>
        <!--end::Item-->
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-400 w-5px h-2px"></span>
        </li>
        <li class="breadcrumb-item text-muted">Ürün Ekle</li>
    </ul>
    <!--end::Breadcrumb-->
@endsection
@section('content')
    <div id="kt_app_content_container" class="app-container container-xxl">
        <form id="kt_ecommerce_add_product_form" class="form d-flex flex-column flex-lg-row" data-kt-redirect="products.html">
            @include('admin.product.create.parts.col-1')
            @include('admin.product.create.parts.col-2')
        </form>

    </div>

@endsection

@section('scripts')
    <script>
        var tagData = @json($tags)
    </script>
    <script src="/assets/plugins/custom/formrepeater/formrepeater.bundle.js"></script>
    <script src="/assets/js/project/product/save-product.js"></script>
    <script>
        var fileInput = null;

        function activateFileInput() {
            if (!fileInput) {
                // Create a file input element if it doesn't exist
                fileInput = document.createElement('input');
                fileInput.name="product_images[]"
                fileInput.type = 'file';
                fileInput.multiple = true; // Allow multiple file selection
                fileInput.style.display = 'none'; // Hide the input element

                // Trigger file input change event when files are selected
                fileInput.addEventListener('change', function() {
                    // Handle selected files
                    console.log("Selected files:", this.files);
                });

                // Append the file input to the dropzone
                document.querySelector('.dropzone').appendChild(fileInput);
            }

            // Trigger click event on the file input
            fileInput.click();
        }
    </script>
    <script>
        // Bu fonksiyon, varyasyon seçildiğinde çağrılacak olan Ajax isteğini gerçekleştirir.
        function getVariantCategories(variationId, $selectElement) {
            // Ajax isteği gönderme
            $.ajax({
                url: '{{route('admin.ajax.getVariantOption')}}',
                method: 'POST',
                data: {
                    '_token': csrf_token,
                    variation_id: variationId
                },
                success: function(response) {
                    $selectElement.empty();
                    $.each(response, function(key, value) {
                        console.log(value);
                        $selectElement.append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                },
                error: function(xhr, status, error) {
                    // Hata durumunda burası çalışır
                    console.error(error);
                }
            });
        }

    </script>
@endsection
