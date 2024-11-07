
<div class="tab-pane fade @if($loop->first) show active @endif" id="kt_tab_pane_{{$row->code}}" role="tabpanel">

    <div class="fv-row mb-7">
        <!--begin::Label-->
        <label class="required fs-6 fw-semibold mb-2">Başlık</label>
        <!--end::Label-->
        <!--begin::Input-->
        <input type="text" class="form-control form-control-solid" placeholder="" name="title[{{$row->code}}]" value="" />
        <!--end::Input-->
    </div>
    @foreach(range(1, 3) as $boxC)
        <div class="row">
            <div class="fv-row mb-7 col-6">
                <!--begin::Label-->
                <label class="required fs-6 fw-semibold mb-2">Kutu {{$boxC}} Başlık</label>
                <!--end::Label-->
                <!--begin::Input-->
                <input type="text" class="form-control form-control-solid" placeholder="örn. Yıllık Deneyim" name="box_{{$boxC}}_title[{{$row->code}}]" value="" />
                <!--end::Input-->
            </div>
            <div class="fv-row mb-7 col-6">
                <!--begin::Label-->
                <label class="required fs-6 fw-semibold mb-2">Kutu {{$boxC}} Sayaç</label>
                <!--end::Label-->
                <!--begin::Input-->
                <input type="number" class="form-control form-control-solid" placeholder="örn. 10" name="box_{{$boxC}}_counter[{{$row->code}}]" value="" />
                <!--end::Input-->
            </div>
        </div>
    @endforeach

    <div class="fv-row mb-7">
        <!--begin::Label-->
        <label class="required fs-6 fw-semibold mb-2">Açıklama</label>
        <!--end::Label-->
        <!--begin::Input-->
        <textarea class="form-control form-control-solid" rows="7" placeholder="örn. [Firma Adı], alüminyum sektöründe uzun yıllara dayanan tecrübemiz ...." name="descriptions[{{$row->code}}]"></textarea>
        <!--end::Input-->
    </div>
</div>
