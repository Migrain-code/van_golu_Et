@extends('layouts.master')
@section('title', 'İşletme Listesi')
@section('styles')
    <style>
        .image-input .image-input-wrapper {
            background-image: url('/assets/media/svg/avatars/blank.svg');
        }

        [data-bs-theme="dark"] .image-input .image-input-wrapper {
            background-image: url('/assets/media/svg/avatars/blank-dark.svg');
        }

         #searchInput{
             position: absolute;
             left: 177px;
             top: 8px !important;
             width: 67%;
             height: 40px;
             border-radius: 15px;
             padding: 5px;
             border: 1px solid #600ee4;
             outline: 0px;
         }
         #map{
             width: 800px !important;
             margin-left: -80px !important;
             border-radius: 15px;
         }
    </style>

@endsection
@section('breadcrumb')
    <!--begin::Title-->
    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Ana Panel</h1>
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
        <li class="breadcrumb-item text-muted">Dashboard</li>
        <!--end::Item-->
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-400 w-5px h-2px"></span>
        </li>
        <!--end::Item-->
        <!--begin::Item-->
        <li class="breadcrumb-item text-muted">İşletmeler</li>
        <!--end::Item-->
    </ul>
    <!--end::Breadcrumb-->
@endsection
@section('content')
    <div id="kt_app_content_container" class="app-container container-xxl">
        <!--begin::Card-->
        <div class="card">
            <!--begin::Card header-->
            @include('business.components.toolbar')
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body pt-0">
                <!--begin::Table-->
                <table class="table align-middle table-row-dashed fs-6 gy-5" id="datatable">
                    <!--begin::Table head-->
                    <thead>
                        <!--begin::Table row-->
                        <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                            <th class="w-10px pe-2">
                                <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                    <input class="form-check-input delete" type="checkbox" data-kt-check="true" data-kt-check-target="#datatable .delete" value="1" />
                                </div>
                            </th>
                            <th class="min-w-125px">İşletme Adı</th>
                            <th class="min-w-125px">Telefon</th>
                            <th class="min-w-125px">Status</th>
                            <th class="min-w-125px">Konum</th>
                            <th class="min-w-125px">Created Date</th>
                            <th class="text-end min-w-70px">Actions</th>
                        </tr>
                        <!--end::Table row-->
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody class="fw-semibold text-gray-600">

                    </tbody>
                    <!--end::Table body-->
                </table>
                <!--end::Table-->
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card-->
        <!--begin::Modals-->
        @include('business.components.add-business')
        @include('business.components.export-modal')
        <!--end::Modals-->
    </div>

@endsection

@section('scripts')
    <script>
        var csrf_token_new = '{{csrf_token()}}';
        let DATA_URL = "{{route('admin.business.datatable')}}";
        let DATA_COLUMNS = [
            {data: 'id'},
            {data: 'name'},
            {data: 'phone'},
            {data: 'status'},
            {data: 'city_id'},
            {data: 'created_at'},
            {data: 'action'}
        ];
        let addUrl = "{{route('admin.business.store')}}"
    </script>

    <script src="/assets/js/project/business/create-account.js"></script>
    <script src="/assets/js/custom.js"></script>
    <script src="/assets/js/project/business/export.js"></script>
    <script src="/assets/js/project/business/listing.js"></script>
    <script>
        $(".timeSelector").flatpickr({
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
            time_24hr: true
        });
        $(".timeSelector2").flatpickr({
            enableTime: false,
            noCalendar: false,
            dateFormat: "d.m.Y",
        });
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBcMXrk2ldIslFsanG5wUm5EuuTjkLfl8U&libraries=places&callback=initAutocomplete" async defer></script>
    <script>
        let map;
        let marker = null;

        function initAutocomplete() {
            // Harita başlatma kodu burada
            var businessLat = '{{/*$business->lat ??*/"41.0254943"}}';
            var businessLong = '{{/*$business->longitude ??*/"40.5176823"}}';
            if (isNaN(businessLat) || isNaN(businessLong)) {
                businessLat = 41.0254943; // Varsayılan enlem
                businessLong = 40.5176823; // Varsayılan boylam
            }
            map = new google.maps.Map(document.getElementById('map'), {
                center: { lat: parseFloat(businessLat), lng: parseFloat(businessLong) },
                zoom: 12,
                mapTypeId: "roadmap",
            });

            // Harita üzerine tıklama olayı
            google.maps.event.addListener(map, 'click', function(event) {
                if (marker !== null) {
                    marker.setMap(null);
                }

                var latitude = event.latLng.lat();
                var longitude = event.latLng.lng();

                addEmbed(latitude, longitude);

                reverseGeocode(latitude, longitude);

                marker = new google.maps.Marker({
                    position: { lat: latitude, lng: longitude },
                    map: map,
                    title: 'Seçilen Konum'
                });

                document.getElementById('latitude').value = latitude;
                document.getElementById('longitude').value = longitude;
            });

            // Sayfa yüklendiğinde işletme konumu veya varsayılan konumu göster
            $(function () {
                marker = new google.maps.Marker({
                    position: { lat: parseFloat(businessLat), lng: parseFloat(businessLong) },
                    map: map,
                    title: 'Seçilen Konum'
                });
            });

            // Adres arama işlevselliği
            const input = document.getElementById("searchInput");
            const searchBox = new google.maps.places.SearchBox(input);
            map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

            map.addListener("bounds_changed", () => {
                searchBox.setBounds(map.getBounds());
            });

            searchBox.addListener("places_changed", () => {
                const places = searchBox.getPlaces();

                if (places.length == 0) {
                    return;
                }

                if (marker !== null) {
                    marker.setMap(null);
                }

                const bounds = new google.maps.LatLngBounds();

                places.forEach((place) => {
                    if (!place.geometry || !place.geometry.location) {
                        console.log("Returned place contains no geometry");
                        return;
                    }
                    const latitude = place.geometry.location.lat();
                    const longitude = place.geometry.location.lng();
                    reverseGeocode(latitude, longitude);
                    marker = new google.maps.Marker({
                        map: map,
                        title: place.name,
                        position: place.geometry.location,
                    });

                    if (place.geometry.viewport) {
                        bounds.union(place.geometry.viewport);
                    } else {
                        bounds.extend(place.geometry.location);
                    }
                });

                map.fitBounds(bounds);
            });
        }
        function addEmbed(latitude,longitude){
            var embedUrl = `https://www.google.com/maps/embed/v1/place?q=${latitude},${longitude}&key=AIzaSyBcMXrk2ldIslFsanG5wUm5EuuTjkLfl8U`;
            var embed = `<iframe width="350" height="350" frameborder="0" style="border:0;border-radius: 15px"
                    src="${embedUrl}" allowfullscreen></iframe>`
            $('#embed').text(embed);

            /*var embedView = document.getElementById('embedView');
            embedView.innerHTML = embed;*/
        }
        function reverseGeocode(latitude, longitude) {
            var geocodingUrl = `https://maps.googleapis.com/maps/api/geocode/json?latlng=${latitude},${longitude}&key=AIzaSyBcMXrk2ldIslFsanG5wUm5EuuTjkLfl8U`;

            fetch(geocodingUrl)
                .then(response => response.json())
                .then(data => {
                    console.log(data)
                    if (data.status === "OK") {
                        var selectedAddress = data.results[0].formatted_address;
                        $('#address').text(selectedAddress);
                    } else {
                        console.log("Adres alınamadı.");
                    }
                })
                .catch(error => {
                    console.log("Hata Adres Alınamadı");
                });
        }

        // Enter tuşunu engelleme işlemi
        document.getElementById("searchInput").addEventListener("keydown", function(event) {
            if (event.keyCode === 13) {
                event.preventDefault();
                return false;
            }
        });
    </script>
@endsection
