<div class="tab-pane fade show active" id="kt_tab_pane_1" role="tabpanel">
    <div class="d-flex flex-column mb-7 fv-row">
        <!--begin::Label-->
        <label class="fs-6 fw-semibold mb-2">
            <span class="required">Ana Kategori</span>
            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Kategori, Hangi kategorinin altında görüntülenecek"></i>
        </label>
        <!--end::Label-->
        <!--begin::Input-->
        <select name="category_id" id="city_select" aria-label="Ana Kategori Seçiniz" data-control="select2" data-placeholder="Ana Kategori Seçiniz..."  class="form-select form-select-solid fw-bold">
            <option value="">Ana Kategori Seçiniz</option>
            @foreach($categories as $category)
                <option value="{{$category->id}}" @selected($category->id == $subCategoryProduct->category_id)>{{$category->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="fv-row mb-7">
        <!--begin::Label-->
        <label class="required fs-6 fw-semibold mb-2">Kategori Adı</label>
        <!--end::Label-->
        <!--begin::Input-->
        <input type="text" class="form-control form-control-solid" placeholder="" name="name" value="{{$subCategoryProduct->name}}" />
        <!--end::Input-->
    </div>
    <div class="fv-row mb-7">
        <!--begin::Label-->
        <label class="required fs-6 fw-semibold mb-2">Meta Başlık</label>
        <!--end::Label-->
        <!--begin::Input-->
        <input type="text" class="form-control form-control-solid" placeholder="" name="meta_title" value="{{$subCategoryProduct->meta_title}}" />
        <!--end::Input-->
    </div>
    <div class="fv-row mb-7">
        <!--begin::Label-->
        <label class="required fs-6 fw-semibold mb-2">Meta Açıklama</label>
        <!--end::Label-->
        <!--begin::Input-->
        <input type="text" class="form-control form-control-solid" placeholder="" name="meta_description" value="{{$subCategoryProduct->meta_description}}" />
        <!--end::Input-->
    </div>
</div>
