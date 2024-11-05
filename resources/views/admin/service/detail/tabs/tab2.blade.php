<div class="tab-pane fade" id="kt_tab_pane_2" role="tabpanel">

    <div class="fv-row mb-7">
        <!--begin::Label-->
        <label class="fs-6 fw-semibold mb-2">
            <span class="required">İkon <a href="{{image($serviceSubCategory->image)}}" target="_blank">(Görüntüle)</a></span>
            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Kategori Görseli zorunludur"></i>
        </label>
        <!--end::Label-->
        <!--begin::Input-->
        <input type="file" class="form-control form-control-solid" placeholder="" name="category_icon" value="" />
        <!--end::Input-->
    </div>

    <div class="fv-row mb-7">
        <!--begin::Label-->
        <label class="fs-6 fw-semibold mb-2">
            <span class="required">Hizmet Kategorisi</span>
            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Hizmet Kategorisi"></i>
        </label>
        <!--end::Label-->
        <!--begin::Input-->
        <select name="category_id" class="form-control form-select-solid">
            <option value="" selected>Hizmet Kategorisi Seçiniz</option>
            @foreach($serviceCategories as $category)
                <option value="{{$category->id}}" @selected($category->id == $serviceSubCategory->category_id)>{{$category->getName()}}</option>
            @endforeach
        </select>
        <!--end::Input-->
    </div>
    {{--
        <div class="fv-row mb-7">
        <!--begin::Label-->
        <label class="fs-6 fw-semibold mb-2">
            <span class="required">Tanıtım Görseli <a href="{{image($serviceSubCategory->cover_image)}}" target="_blank">(Görüntüle)</a></span>
            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Kategori Görseli zorunludur"></i>
        </label>
        <!--end::Label-->
        <!--begin::Input-->
        <input type="file" class="form-control form-control-solid" placeholder="" name="cover_image" value="" />
        <!--end::Input-->
    </div>
    --}}


</div>
