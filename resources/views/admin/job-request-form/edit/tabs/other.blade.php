<div class="tab-pane fade show active" id="kt_tab_pane_other" role="tabpanel">

    <div class="fv-row mb-7">
        <!-- Adınız -->
        <label class="fs-6 fw-semibold mb-2">{{__('Adınız')}}</label>
        <input type="text" class="form-control form-control-solid" name="name" value="{{$jobRequestForm->name}}" />
    </div>

    <div class="fv-row mb-7">
        <!-- Soyadınız -->
        <label class="fs-6 fw-semibold mb-2">{{__('Soyadınız')}}</label>
        <input type="text" class="form-control form-control-solid" name="surname" value="{{$jobRequestForm->surname}}" />
    </div>

    <div class="fv-row mb-7">
        <!-- T.C Kimlik No -->
        <label class="fs-6 fw-semibold mb-2">{{__('T.C Kimlik No')}}</label>
        <input type="text" class="form-control form-control-solid" name="card_no" value="{{$jobRequestForm->card_no}}" />
    </div>

    <div class="fv-row mb-7">
        <!-- Doğum Tarihi -->
        <label class="fs-6 fw-semibold mb-2">{{__('Doğum Tarihi')}}</label>
        <input type="date" class="form-control form-control-solid" name="birthday" value="{{$jobRequestForm->birthday}}" />
    </div>

    <div class="fv-row mb-7">
        <!-- Cinsiyet -->
        <label class="fs-6 fw-semibold mb-2">{{__('Cinsiyet')}}</label>
        <div class="d-flex gap-3">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" id="genderMale" value="0"  @checked($jobRequestForm->gender == 0)>
                <label class="form-check-label" for="genderMale">{{__('Erkek')}}</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" id="genderFemale" value="1" @checked($jobRequestForm->gender == 1)>
                <label class="form-check-label" for="genderFemale">{{__('Kadın')}}</label>
            </div>
        </div>
    </div>

    <div class="fv-row mb-7">
        <!-- Cep Telefonu -->
        <label class="fs-6 fw-semibold mb-2">{{__('Cep Telefonu')}}</label>
        <input type="text" class="form-control form-control-solid" name="phone" value="{{$jobRequestForm->phone}}" />
    </div>

    <div class="fv-row mb-7">
        <!-- E-posta -->
        <label class="fs-6 fw-semibold mb-2">{{__('E-posta')}}</label>
        <input type="email" class="form-control form-control-solid" name="email" value="{{$jobRequestForm->email}}" />
    </div>

    <div class="fv-row mb-7">
        <!-- İl -->
        <label class="fs-6 fw-semibold mb-2">{{__('İl')}}</label>
        <select class="form-select form-select-lg" name="city_id">
            <option value="">{{__('İl Seçiniz')}}</option>
            @foreach($cities as $city)
                <option value="{{$city->id}}" @selected($city->id == $jobRequestForm->city_id)>{{$city->name}}</option>
            @endforeach
            <!-- Populate with city options here -->
        </select>
    </div>

    <div class="fv-row mb-7">
        <!-- İlçe -->
        <label class="fs-6 fw-semibold mb-2">{{__('İlçe')}}</label>
        <select class="form-select form-select-lg" name="district_id">
            @foreach($jobRequestForm->city->districts as $district)
                <option value="{{$district->id}}" @selected($district->id == $jobRequestForm->district_id)>{{$district->name}}</option>
            @endforeach
            <!-- Populate with district options here -->
        </select>
    </div>

    <div class="fv-row mb-7">
        <!-- Adres -->
        <label class="fs-6 fw-semibold mb-2">{{__('Adres')}}</label>
        <textarea class="form-control form-control-solid" name="address" rows="2">{{$jobRequestForm->address}}</textarea>
    </div>

    <div class="fv-row mb-7">
        <!-- Eğitim Derecesi -->
        <label class="fs-6 fw-semibold mb-2">{{__('Eğitim Derecesi')}}</label>
        <select class="form-select form-select-lg" name="education_degree">
            <option value="">{{__('Eğitim Derecesi Seçiniz')}}</option>
            <option value="0" @selected($jobRequestForm->education_degree == 0)>{{__('Doktora')}}</option>
            <option value="1" @selected($jobRequestForm->education_degree == 1)>{{__('Yüksek Lisans')}}</option>
            <option value="2" @selected($jobRequestForm->education_degree == 2)>{{__('Lisans')}}</option>
            <option value="3" @selected($jobRequestForm->education_degree == 3)>{{__('Ön Lisans')}}</option>
            <option value="4" @selected($jobRequestForm->education_degree == 4)>{{__('Lise')}}</option>
            <option value="5" @selected($jobRequestForm->education_degree == 5)>{{__('Orta Öğretim')}}</option>
        </select>
    </div>

    <div class="mb-7 d-flex align-items-center gap-2">
        <!-- Özgeçmiş -->
        <div class="fv-row w-100">
            <label class="fs-6 fw-semibold mb-2">{{__('Özgeçmiş Ekle')}}</label>
            <input type="file" class="form-control form-control-solid" name="resume" value="" />

        </div>
        <a href="{{image($jobRequestForm->resume)}}" class="btn btn-primary" download>Mevcut Özgeçmişi İndir</a>
    </div>

    <div class="fv-row mb-7">
        <!-- KVKK Checkbox -->
        <div class="form-check">
            <input class="form-check-input" type="hidden" name="kvkk_box" id="kvkkBox" value="1">
        </div>
    </div>
</div>
