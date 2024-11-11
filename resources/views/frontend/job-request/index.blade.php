@extends('frontend.layouts.master')
@section('title', trans('İş Başvuru Formu'))
@section('description', trans('İş Başvuru Formu'))
@section('content')

    <div class="section-xl bg-image parallax section-divider-curve-bottom" data-bg-src="{{image(setting('speed_contact_image'))}}">
        <div class="bg-dark-06">
            <div class="container text-center">
                <h1 class="fw-normal m-0">{{__('İş Başvuru Formu')}}</h1>
                <ul class="list-inline-dash">
                    <li><a href="/">{{__('Anasayfa')}}</a></li>
                    <li><a href="{{route('jobRequest.index')}}">{{__('İş Başvuru Formu')}}</a></li>

                </ul>
            </div>
        </div>
    </div>

    <!-- product section -->
    <div class="section" style="padding-top: 0px !important;">
        <div class="container">
            <div class="card mt-5">
                <form class="card-body" method="post" action="{{route('jobRequest.sendForm')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="section-content">
                        <div class="row justify-content-center">
                            <div class="col-md-12 text-center">
                                <h3 class="h3"> {{__('İş Başvuru Formu')}}</h3>
                                <div class="dez-separator bg-primary"></div>
                            </div>
                        </div>

                        <div class="row mt-5">
                            <div class="col-md-6">
                                <h5 class="h5 m-t10 border-bottom pb-2 fw-bold mb-4">{{__('Kişisel Bilgiler')}}</h5>

                                <div class="row">
                                    <div class="col-md-12 mb-2">
                                        <div class="newsLetter-bs">
                                            <div class="dzSubscribeMsg"></div>
                                            <div class="input-group-btn-vertical" style="text-align:left;">
                                                <label style="text-align:left;">{{__('Adınız')}}</label>

                                                <input autocomplete="off" name="name" class="form-control custom-form-control"
                                                       type="text" value="">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 mb-2">
                                        <div class="newsLetter-bs">
                                            <div class="dzSubscribeMsg"></div>
                                            <div class="input-group-btn-vertical" style="text-align:left;">
                                                <label style="text-align:left;">{{__('Soyadınız')}}</label>

                                                <input autocomplete="off" name="surname" class="form-control custom-form-control"
                                                       type="text" value="">

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 mb-2">
                                        <div class="newsLetter-bs">
                                            <div class="dzSubscribeMsg"></div>
                                            <div class="input-group-btn-vertical" style="text-align:left;">
                                                <label style="text-align:left;">{{__('T.C Kimlik No')}}</label>
                                                <input autocomplete="off" name="card_no" class="form-control custom-form-control"
                                                      type="text" value="">

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-2">
                                        <div class="newsLetter-bs">
                                            <div class="dzSubscribeMsg"></div>
                                            <div class="input-group-btn-vertical" style="text-align:left;">
                                                <label style="text-align:left;">{{__('Doğum Tarihi')}}</label>
                                                <input class="form-control custom-form-control text-box single-line"
                                                       name="birthday" type="date"
                                                       value="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-2">
                                        <div class="d-flex">
                                            <div class="d-flex flex-column" style="text-align:left;">
                                                <label class="w-100">{{__('Cinsiyet')}}</label>
                                                <div class="d-flex gap-3 mt-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="gender" id="exampleRadios1" value="0" checked>
                                                        <label class="form-check-label" for="exampleRadios1">
                                                            {{__('Erkek')}}
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="gender" id="exampleRadios2" value="1" checked>
                                                        <label class="form-check-label" for="exampleRadios2">
                                                            {{__('Kadın')}}
                                                        </label>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-6">
                                <h5 class="h5 m-t10 border-bottom pb-2 fw-bold mb-4">{{__('İletişim Bilgileri')}}</h5>

                                <div class="row">
                                    <div class="col-md-12 mb-2">
                                        <div class="newsLetter-bs">
                                            <div class="dzSubscribeMsg"></div>
                                            <div class="input-group-btn-vertical" style="text-align:left;">
                                                <label style="text-align:left;">{{__('Cep Telefonu')}}</label>
                                                <input autocomplete="off"
                                                       name="phone"
                                                       class="form-control custom-form-control text-box single-line"
                                                       type="text" value="">

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 mb-2">
                                        <div class="newsLetter-bs">
                                            <div class="dzSubscribeMsg"></div>
                                            <div class="input-group-btn-vertical" style="text-align:left;">
                                                <label style="text-align:left;">{{__('E-posta')}}</label>
                                                <input autocomplete="off"
                                                       name="email"
                                                       class="form-control custom-form-control text-box single-line"
                                                       type="email" value="">

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-2">
                                        <div class="newsLetter-bs">
                                            <div class="dzSubscribeMsg"></div>
                                            <div class="input-group-btn-vertical" style="text-align:left;">
                                                <label style="text-align:left;margin-top:0px">{{__('İl')}}</label>
                                                <select class="form-select form-select-lg" id="Il"
                                                        name="city_id">
                                                    <option value="">{{__('İl Seçiniz')}}</option>
                                                    @foreach($cities as $city)
                                                        <option value="{{$city->id}}">{{$city->name}}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-2">
                                        <div class="newsLetter-bs">
                                            <div class="dzSubscribeMsg"></div>
                                            <div class="input-group-btn-vertical" style="text-align:left;">
                                                <label style="text-align:left;">{{__('İlçe')}}</label>
                                                <div id="ilce_div">
                                                    <select  class="form-select form-select-lg" id="Ilce" name="district_id">"

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 mb-2">
                                        <div class="newsLetter-bs">
                                            <div class="dzSubscribeMsg"></div>
                                            <div class="input-group-btn-vertical" style="text-align:left;">
                                                <label style="text-align:left;">{{__('Adres')}}</label>
                                                <textarea autocomplete="off" class="form-control custom-form-control" cols="10" name="address" data-val="true" rows="2"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 text-center section-head mb-4">
                            <h5 class="h5 m-t10 border-bottom p-2 fw-bold">{{__('Eğitim Bilgileri')}}</h5>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <label style="text-align:left;">{{__('Eğitim Derecesi')}}</label>
                                <select class="form-select form-select-lg" id="IsBasvuruForm_Egitimderecesi"
                                        name="education_degree">
                                    <option value="">{{__('Eğitim Derecesi Seçiniz')}}</option>
                                    <option value="0">{{__('Doktora')}}</option>
                                    <option value="1">{{__('Yüksek Lisans')}}</option>
                                    <option value="2">{{__('Lisans')}}</option>
                                    <option value="3">{{__('Ön Lisans')}}</option>
                                    <option value="4">{{__('Lise')}}</option>
                                    <option value="5">{{__('Orta Öğretim')}}</option>
                                </select>

                            </div>

                            <div class="col-12 col-lg-6 mb-2">
                                <div class="newsLetter-bs">
                                    <div class="dzSubscribeMsg"></div>
                                    <div class="input-group-btn-vertical" style="text-align:left;">
                                        <label style="text-align:left;">{{__('Özgeçmiş Ekle')}}</label>
                                        <input autocomplete="off"
                                               name="resume"
                                               class="form-control custom-form-control text-box single-line"
                                               type="file" value="">

                                    </div>
                                </div>
                            </div>


                        </div>

                        <div class="row mb-4">
                            <div class="col-md-12 mb-2">
                                <div class="form-check">
                                    <input class="form-check-input" name="kvkk_box" id="defaultCheck1" type="checkbox" value="1">
                                    <label class="form-check-label" for="defaultCheck1">
                                        <a href="{{route('kvkk.index')}}" style="text-decoration:underline;color:blue" target="_blank">
                                            {{__('Çalışan Adaylarına İlişkin Kişisel Verilerin Korunması Kanunu Kapsamında Aydınlatma Metnini Okudum, Onaylıyorum')}}
                                        </a>
                                    </label>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 text-center section-head">
                        <div class="col-md-6 offset-md-3 m-t10">
                            <button class="btn btn-secondary w-75" name="submit" type="submit" value="Submit">
                                {{__('Formu Gönder')}}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end product section -->

@endsection
@section('scripts')
    <script>
        $(document).on('change', '[name="city_id"]', function () {

            let id = $(this).val();
            var district = $('[name="district_id"]');
            district.empty();
            $.ajax({
                url: '{{route('city')}}',
                type: "POST",
                data: {
                    "_token": csrf_token,
                    'id': id,
                },
                dataType: "JSON",
                success: function (res) {
                    $.each(res, function (index, item) {
                        district.append('<option value="' + item.id + '">' + item.name + '</option>');
                    });
                }
            });
        });

    </script>
@endsection
