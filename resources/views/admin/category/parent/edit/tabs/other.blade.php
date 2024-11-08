<div class="tab-pane fade" id="kt_tab_pane_other" role="tabpanel">

    <div class="fv-row mb-7">
        <!--begin::Label-->
        <label class="required fs-6 fw-semibold mb-2">Kategori Görseli (1920 * 1200)</label>
        <!--end::Label-->
        <img src="{{image($category->image)}}" style="width: 200px;cursor: zoom-in" onclick="window.open('{{image($category->image)}}')">
        <!--begin::Input-->
        <input type="file" class="form-control form-control-solid" placeholder="" name="image" value="" />
        <!--end::Input-->
    </div>
    {{-- <div class="fv-row mb-7">
        <!--begin::Label-->
        <label class="required fs-6 fw-semibold mb-2">Blog Kategorisi</label>
        <!--end::Label-->
        <!--begin::Input-->
        <select class="form-control form-control-solid"  name="category_id">
            <option value="">Kategori Seçiniz</option>
            @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
        <!--end::Input-->
    </div>--}}
</div>
