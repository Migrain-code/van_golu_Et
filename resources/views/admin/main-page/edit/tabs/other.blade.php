<div class="tab-pane fade" id="kt_tab_pane_other" role="tabpanel">

    <div class="fv-row mb-7">
        <!--begin::Label-->
        <label class="required fs-6 fw-semibold mb-2">Bölüm Görseli (660 * 700)</label>
        <!--end::Label-->
        <img src="{{image($mainPage->image)}}" onclick="window.open('{{image($mainPage->image)}}')" width="50px">

        <!--begin::Input-->
        <input type="file" class="form-control form-control-solid" placeholder="" name="image" value="" />
        <!--end::Input-->
    </div>
    <div class="fv-row mb-7">
        <!--begin::Label-->
        <label class="required fs-6 fw-semibold mb-2">Görsel Ne Tarafta Olsun</label>
        <!--end::Label-->
        <!--begin::Input-->
        <select name="image_rotation" class="form-select">
            <option value="0" @selected($mainPage->image_rotation == "0")>Sol</option>
            <option value="1" @selected($mainPage->image_rotation == "1")>Sağ</option>
        </select>
        <!--end::Input-->
    </div>

</div>
