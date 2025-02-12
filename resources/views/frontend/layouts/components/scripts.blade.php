<!-- ***** JAVASCRIPTS ***** -->
<!-- JS here -->
<script src="/frontend/assets/js/vendor/jquery-3.6.0.min.js"></script>
<script src="/frontend/assets/js/bootstrap.min.js"></script>
<script src="/frontend/assets/js/imagesloaded.pkgd.min.js"></script>
<script src="/frontend/assets/js/jquery.countdown.min.js"></script>
<script src="/frontend/assets/js/jquery.magnific-popup.min.js"></script>
<script src="/frontend/assets/js/jquery.odometer.min.js"></script>
<script src="/frontend/assets/js/jquery.appear.js"></script>
<script src="/frontend/assets/js/tween-max.min.js"></script>
<script src="/frontend/assets/js/slick.min.js"></script>
<script src="/frontend/assets/js/slick-animation.min.js"></script>
<script src="/frontend/assets/js/jquery-ui.min.js"></script>
<script src="/frontend/assets/js/ajax-form.js"></script>
<script src="/frontend/assets/js/wow.min.js"></script>
<script src="/frontend/assets/js/main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    let csrf_token = "{{csrf_token()}}";
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


@yield('scripts')
