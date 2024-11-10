<div class="tab-pane fade" id="kt_tab_pane_other" role="tabpanel">

    <div class="fv-row mb-7">
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
                <optgroup label="{{$category->parent->parent->getName()." > ".$category->parent->getName()." > ".$category->getName()}}">
                    @foreach($category->series as $serie)
                        <option value="{{$serie->id}}">{{$serie->getName()}}</option>
                    @endforeach
                </optgroup>

            @endforeach
        </select>
        <!--end::Input-->
    </div>
    <div class="d-flex flex-column mb-7 fv-row">
        <!--begin::Label-->
        <label class="fs-6 fw-semibold mb-2">
            <span class="required">Referanslar</span>
            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Referanslar"></i>
        </label>
        <!--end::Label-->
        <!--begin::Input-->
        <select name="reference_id[]" multiple id="product_select" aria-label="Referans Seçiniz"
                data-control="select2" data-placeholder="Referans Seçiniz..."
                data-dropdown-parent="#kt_modal_add_faq_form" class="form-select form-select-solid fw-bold">
            <option value="">Referans Seçiniz</option>
            @foreach($references as $reference)
                <option value="{{$reference->id}}">{{$reference->category->getName() ." > ".$reference->getName()}}</option>
            @endforeach
        </select>
    </div>
</div>
