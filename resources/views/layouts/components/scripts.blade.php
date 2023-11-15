<script src="/assets/plugins/global/plugins.bundle.js"></script>
<script src="/assets/js/scripts.bundle.js"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Vendors Javascript(used for this page only)-->
<script src="/assets/plugins/custom/datatables/datatables.bundle.js"></script>
<script src="/assets/plugins/custom/vis-timeline/vis-timeline.bundle.js"></script>>
<!--end::Vendors Javascript-->
<!--begin::Custom Javascript(used for this page only)-->
<script src="/assets/js/widgets.bundle.js"></script>
<script src="/assets/js/custom/widgets.js"></script>
<script src="/assets/js/custom/apps/chat/chat.js"></script>
<script src="/assets/js/custom/utilities/modals/upgrade-plan.js"></script>
<script src="/assets/js/custom/utilities/modals/create-project/type.js"></script>
<script src="/assets/js/custom/utilities/modals/create-project/budget.js"></script>
<script src="/assets/js/custom/utilities/modals/create-project/settings.js"></script>
<script src="/assets/js/custom/utilities/modals/create-project/team.js"></script>
<script src="/assets/js/custom/utilities/modals/create-project/targets.js"></script>
<script src="/assets/js/custom/utilities/modals/create-project/files.js"></script>
<script src="/assets/js/custom/utilities/modals/create-project/complete.js"></script>
<script src="/assets/js/custom/utilities/modals/create-project/main.js"></script>
<script src="/assets/js/custom/utilities/modals/create-app.js"></script>
<script src="/assets/js/custom/utilities/modals/new-address.js"></script>
<script src="/assets/js/custom/utilities/modals/users-search.js"></script>


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
        timer: 30000,
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


@yield('scripts')
