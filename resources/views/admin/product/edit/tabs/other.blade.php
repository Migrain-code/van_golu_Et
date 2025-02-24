<div class="tab-pane fade" id="kt_tab_pane_other" role="tabpanel">

    <div class="fv-row mb-7">
        <img src="{{image($product->image)}}" style="width: 100px;height: 100px;object-fit: cover">
        <!--begin::Label-->
        <label class="required fs-6 fw-semibold mb-2">Ürün Görseli (840 * 560)</label>
        <!--end::Label-->
        <!--begin::Input-->
        <input type="file" class="form-control form-control-solid" placeholder="" name="image" value="" />
        <!--end::Input-->
    </div>
    <div class="fv-row mb-7">
        <!--begin::Label-->
        <label class="required fs-6 fw-semibold mb-2">Ürün Kategorisi</label>
        <!--end::Label-->
        <!--begin::Input-->
        <select class="form-control form-control-solid"  name="category_id">
            <option value="">Kategori Seçiniz</option>
            @foreach($categories as $category)
                <option value="{{$category->id}}" @selected($category->id == $product->group_id)>{{$category->getName()}}</option>
            @endforeach
        </select>
        <!--end::Input-->
    </div>


</div>
