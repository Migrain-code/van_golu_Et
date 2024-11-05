<script src="/assets/plugins/global/plugins.bundle.js"></script>
<script src="/assets/js/scripts.bundle.js"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Vendors Javascript(used for this page only)-->
<script src="/assets/plugins/custom/datatables/datatables.bundle.js"></script>
<script src="/assets/plugins/custom/vis-timeline/vis-timeline.bundle.js"></script>>
<!--end::Vendors Javascript-->
<!--begin::Custom Javascript(used for this page only)-->

{{--
    <script src="/assets/js/widgets.bundle.js"></script>
    <script src="/assets/js/custom/widgets.js"></script>
--}}


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="https://cdn.jsdelivr.net/npm/inputmask@5.0.9/dist/inputmask/inputmask.min.js"></script>
<!-- Inputmask bindings dosyasını yükle -->
<script src="https://cdn.jsdelivr.net/npm/inputmask@5.0.9/dist/bindings/inputmask.binding.min.js"></script>

<script src="/assets/js/custom.js"></script>

<script>
    /*$(document).ready(function(){
        //$(selector).inputmask("99-9999999");  //static mask
        //$('.phone').inputmask({"mask": "(999) 999-9999"}); //specifying options
        //$(selector).inputmask("9-a{1,3}9{1,3}"); //mask with dynamic syntax
    });*/
</script>
<script>
    let csrf_token = "{{csrf_token()}}";
    let ajax_urls = {
        'updateFeaturedUrl' : '{{route('admin.ajax.updateFeatured')}}',
        'deleteFeatured' : '{{route('admin.ajax.deleteFeatured')}}',
        'deleteAllFeatured' : '{{route('admin.ajax.deleteAllFeatured')}}',
        'getDistrictUrl' : '{{route('admin.ajax.getDistrictUrl')}}',
    }
</script>
<script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,//3sn
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })
</script>
@if(session('response'))
    <script>
        Toast.fire({
            icon: '{{session('response.status')}}',
            title: '{{session('response.message')}}',

        })
    </script>
@endif
@if($errors->any())
    <script>
        var errors = [];
        @foreach ($errors->all() as $error)
        errors.push("{{ $error }}");
        @endforeach

        Swal.fire({
            title: 'Hata',
            icon: 'error',
            html: errors.join("<br>"),
            confirmButtonText: "Tamam"
        });
    </script>
@endif
<style>
    .swal2-popup.swal2-toast .swal2-title {
        margin: 0.5em 1em;
        padding: 0;
        font-size: 1em;
        text-align: initial;
        color: black !important;
        font-weight: 700 !important;

    }
</style>
<script>
    function updateFileCount(input) {
        var fileCountSpan = input.parentElement.querySelector('.file-count');
        if (input.files && input.files.length > 0) {
            fileCountSpan.textContent = input.files.length + ' dosya seçildi';
        } else {
            fileCountSpan.textContent = '0 dosya seçildi';
        }
    }
</script>

@yield('scripts')
