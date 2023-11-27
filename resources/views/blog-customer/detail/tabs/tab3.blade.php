<div class="tab-pane fade" id="kt_tab_pane_3" role="tabpanel">
    <div class="fv-row mb-7">
        <!--begin::Label-->
        <label class="fs-6 fw-semibold mb-2">
            <span class="required">Görsel</span>
            <i class="fas fa-exclamation-circle ms-1 fs-7 me-2" data-bs-toggle="tooltip" title="Link alanı zorunludur"></i>
            <a href="{{image($customerBlog->image)}}" target="_blank">Görüntüle</a>
        </label>
        <!--begin::Input-->
        <input type="file" class="form-control form-control-solid" placeholder="" name="image" value="" />
        <!--end::Input-->
    </div>
    <div class="fv-row mb-7">
        <!--begin::Label-->
        <label class="fs-6 fw-semibold mb-2">
            <span class="required">Tür Seçiniz</span>
            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Link alanı zorunludur"></i>
        </label>
        <!--end::Label-->
        <!--begin::Input-->
        <select name="category_id" class="form-control form-select-solid">
            @foreach($categories as $category)
                <option value="{{$category->id}}" @selected($category->id == $customerBlog->category_id)>{{$category->getName()}}</option>
            @endforeach
        </select>
        <!--end::Input-->
    </div>
</div>
