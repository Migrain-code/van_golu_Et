<div class="tab-pane fade" id="kt_tab_pane_other" role="tabpanel">

    <div class="fv-row mb-7">
        <!--begin::Label-->
        <label class="required fs-6 fw-semibold mb-2">Kategori Görseli (1920 * 1200)</label>
        <!--end::Label-->
        <!--begin::Input-->
        <input type="file" class="form-control form-control-solid" placeholder="" name="image" value="" />
        <!--end::Input-->
    </div>
    <div class="fv-row mb-7">
        <!--begin::Label-->
        <label class="required fs-6 fw-semibold mb-2">Ana Kategorisi</label>
        <!--end::Label-->
        <!--begin::Input-->
        <select class="form-control form-control-solid"  name="category_id">
            <option value="">Kategori Seçiniz</option>
            @foreach($categories as $category)
                <optgroup label="{{$category->parent->getName() . " > " . $category->getName() }}">
                    @foreach($category->subCategories as $pCategory)
                        <option value="{{ $pCategory->id }}" >
                            {{$pCategory->getName() }}
                        </option>
                    @endforeach
                </optgroup>
            @endforeach
        </select>
        <!--end::Input-->
    </div>
</div>
