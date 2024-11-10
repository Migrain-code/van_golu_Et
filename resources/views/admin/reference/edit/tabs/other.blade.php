<div class="tab-pane fade" id="kt_tab_pane_other" role="tabpanel">

    <div class="fv-row mb-7">
        <!--begin::Label-->
        <label class="required fs-6 fw-semibold mb-2 w-100">Referans Tanıtım Görseli (840 * 560)</label>
        <!--end::Label-->
        <img src="{{image($reference->image)}}" class="mb-2 w-200px" onclick="window.open('{{image($reference->image)}}')">
        <!--begin::Input-->
        <input type="file" class="form-control form-control-solid" placeholder="" name="image" value="" />
        <!--end::Input-->
    </div>
    <div class="fv-row mb-7">
        <!--begin::Label-->
        <label class="required fs-6 fw-semibold mb-2 w-100">Diğer Referans Görselleri (840 * 560)</label>
        <!--end::Label-->
         <div class="d-flex gap-2">
             @foreach($reference->images as $refImage)
                 <div class="customImageArea">
                     <img src="{{image($refImage->image)}}" class="mb-2 w-200px" onclick="window.open('{{image($refImage->image)}}')">
                     {!! create_form_delete_button('ReferenceImage', $refImage->id, 'Referans Görselini', 'Refern Görselini Silmek istediğinize emin misiniz?') !!}
                 </div>
             @endforeach
         </div>
        <!--begin::Input-->
        <input type="file" multiple class="form-control form-control-solid" placeholder="" name="images[]" value="" />
        <!--end::Input-->
    </div>
    <div class="fv-row mb-7">
        <!--begin::Label-->
        <label class="required fs-6 fw-semibold mb-2">Referans Kategorisi</label>
        <!--end::Label-->
        <!--begin::Input-->
        <select class="form-control form-control-solid" name="category_id">
            <option value="">Kategori Seçiniz</option>
            @foreach($categories as $category)
                <option value="{{$category->id}}" @selected($category->id == $reference->category_id)>{{$category->getName()}}</option>
            @endforeach
        </select>
        <!--end::Input-->
    </div>
    <div class="d-flex flex-column mb-7 fv-row">
        <!--begin::Label-->
        <label class="fs-6 fw-semibold mb-2">
            <span class="required">Kullanılan Ürünler</span>
            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Referansda Kullanılan Ürünler"></i>
        </label>
        <!--end::Label-->
        <!--begin::Input-->
        <select name="product_id[]" multiple id="product_select" aria-label="Ürün Seçiniz"
                data-control="select2" data-placeholder="Ürün Seçiniz..."
                data-dropdown-parent="#kt_modal_add_faq_form" class="form-select form-select-solid fw-bold">
            <option value="">Ürün Seçiniz</option>
            @foreach($products as $product)
                <option value="{{$product->id}}" @selected(in_array($product->id, $productIds))>
                    {{$product->category->parent->parent->getName() ." > ".$product->category->parent->getName() ." > ".$product->category->getName() ." > ".$product->getName()}}
                </option>
            @endforeach
        </select>
    </div>

</div>
