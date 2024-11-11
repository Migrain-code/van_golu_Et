<div class="tab-pane fade" id="kt_tab_pane_other" role="tabpanel">

    <div class="fv-row mb-7">
        <!--begin::Label-->
        <label class="required fs-6 fw-semibold mb-2 w-100">Üretim Görseli (1200 * 800)</label>
        <!--end::Label-->
        <img src="{{image($production->image)}}" style="width: 200px;margin-bottom: 15px;">
        <!--begin::Input-->
        <input type="file" class="form-control form-control-solid" placeholder="" name="image" value="" />
        <!--end::Input-->
    </div>
    <div class="fv-row mb-7">
        <!--begin::Label-->
        <label class="required fs-6 fw-semibold mb-2">Üretim Kategorisi</label>
        <!--end::Label-->
        <!--begin::Input-->
        <select class="form-control form-control-solid" name="category_id">
            <option value="">Kategori Seçiniz</option>
            @foreach($categories as $category)
                <option value="{{$category->id}}" @selected($production->category_id == $category->id)>{{$category->getName()}}</option>
            @endforeach
        </select>
        <!--end::Input-->
    </div>
</div>
