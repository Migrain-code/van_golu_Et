<!--begin::Aside column-->
<div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
    <!--begin::Thumbnail settings-->
    <div class="card card-flush py-4">
        <!--begin::Card header-->
        <div class="card-header">
            <!--begin::Card title-->
            <div class="card-title">
                <h2>Tanıtım Görseli</h2>
            </div>
            <!--end::Card title-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body text-center pt-0">
            <!--begin::Image input-->
            <!--begin::Image input placeholder-->
            <style>.image-input-placeholder { background-image: url('/assets/media/svg/files/blank-image.svg'); } [data-theme="dark"] .image-input-placeholder { background-image: url('../../../assets/media/svg/files/blank-image-dark.svg'); }</style>
            <!--end::Image input placeholder-->
            <div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3" data-kt-image-input="true">
                <!--begin::Preview existing avatar-->
                <div class="image-input-wrapper w-150px h-150px"></div>
                <!--end::Preview existing avatar-->
                <!--begin::Label-->
                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                    <i class="bi bi-pencil-fill fs-7"></i>
                    <!--begin::Inputs-->
                    <input type="file" name="avatar" accept=".png, .jpg, .jpeg, .webp" />
                    <input type="hidden" name="avatar_remove" />
                    <!--end::Inputs-->
                </label>
                <!--end::Label-->
                <!--begin::Cancel-->
                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
															<i class="bi bi-x fs-2"></i>
														</span>
                <!--end::Cancel-->
                <!--begin::Remove-->
                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
															<i class="bi bi-x fs-2"></i>
														</span>
                <!--end::Remove-->
            </div>
            <!--end::Image input-->
            <!--begin::Description-->
            <div class="text-muted fs-7">Sadece *.png, *.jpg and *.jpeg türlerinde dosya yükleyebilirsiniz</div>
            <!--end::Description-->
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Thumbnail settings-->
    <!--begin::Status-->
    <div class="card card-flush py-4">
        <!--begin::Card header-->
        <div class="card-header">
            <!--begin::Card title-->
            <div class="card-title">
                <h2>Durum</h2>
            </div>
            <!--end::Card title-->
            <!--begin::Card toolbar-->
            <div class="card-toolbar">
                <div class="rounded-circle bg-success w-15px h-15px" id="kt_ecommerce_add_product_status"></div>
            </div>
            <!--begin::Card toolbar-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body pt-0">
            <!--begin::Select2-->
            <select class="form-select mb-2" name="status" data-control="select2" data-hide-search="true" data-placeholder="Ürün Durumunu Seçiniz" id="kt_ecommerce_add_product_status_select">
                <option></option>
                <option value="1" selected="selected">Yayında</option>
                <option value="3">Taslak</option>
                <option value="0">Etkin Değil</option>
                <option value="2">Şu Tarihte Yayına Al</option>
            </select>
            <!--end::Select2-->
            <!--begin::Description-->
            <div class="text-muted fs-7">Ürün Durumunu Seçiniz.</div>
            <!--end::Description-->
            <!--begin::Datepicker-->
            <div class="d-none mt-10">
                <label for="kt_ecommerce_add_product_status_datepicker" class="form-label">Ürünün Yayına Alınacağı Tarihi ve Saati Seçiniz</label>
                <input class="form-control" id="kt_ecommerce_add_product_status_datepicker" name="publication_date" placeholder="Tarih ve Saat Seçiniz" />
            </div>
            <!--end::Datepicker-->
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Status-->
    <!--begin::Category & tags-->
    <div class="card card-flush py-4">
        <!--begin::Card header-->
        <div class="card-header">
            <!--begin::Card title-->
            <div class="card-title">
                <h2>Kategori Ayarları</h2>
            </div>
            <!--end::Card title-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body pt-0">
            <!--begin::Input group-->
            <!--begin::Label-->
            <label class="form-label">Kategoriler</label>
            <!--end::Label-->
            <!--begin::Select2-->
            <select class="form-select mb-2" name="category_id" data-control="select2" data-placeholder="Kategori Seçiniz" data-allow-clear="true" multiple="multiple">
                <option></option>
                @foreach($mainCategories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
            <!--end::Select2-->
            <!--begin::Description-->
            <div class="text-muted fs-7 mb-7">Ürünü Bu Kategoriye Ekle.</div>
            <!--end::Description-->
            <!--end::Input group-->
            <!--begin::Button-->
            <a href="{{route('admin.mainCategory.index')}}" class="btn btn-light-primary btn-sm mb-10">
                <!--begin::Svg Icon | path: icons/duotune/arrows/arr087.svg-->
                <span class="svg-icon svg-icon-2">
														<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
															<rect opacity="0.5" x="11" y="18" width="12" height="2" rx="1" transform="rotate(-90 11 18)" fill="currentColor" />
															<rect x="6" y="11" width="12" height="2" rx="1" fill="currentColor" />
														</svg>
													</span>
                <!--end::Svg Icon-->Yeni Kategori Ekle</a>
            <!--end::Button-->
            <!--begin::Input group-->
            <!--begin::Label-->
            <label class="form-label d-block">Etiketler</label>
            <!--end::Label-->
            <!--begin::Input-->
            <input id="kt_ecommerce_add_product_tags" name="kt_ecommerce_add_product_tags" class="form-control mb-2" value="" />
            <!--end::Input-->
            <!--begin::Description-->
            <div class="text-muted fs-7">Ürünü Bu Etiketlere Ekle.</div>
            <!--end::Description-->
            <!--end::Input group-->
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Category & tags-->

        <!--begin::Template settings-->
    <div class="card card-flush py-4">
        <!--begin::Card header-->
        <div class="card-header">
            <!--begin::Card title-->
            <div class="card-title">
                <h2>Ürün Teması</h2>
            </div>
            <!--end::Card title-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body pt-0">
            <!--begin::Select store template-->
            <label for="kt_ecommerce_add_product_store_template" class="form-label">Ürün Teması</label>
            <!--end::Select store template-->
            <!--begin::Select2-->
            <select class="form-select mb-2" data-control="select2" data-hide-search="true" data-placeholder="Ürün Teması Seçiniz" id="kt_ecommerce_add_product_store_template">
                <option></option>
                @foreach($templates as $template)
                    <option value="{{$template->id}}" @selected($loop->index == 0)>{{$template->name}}</option>
                @endforeach

            </select>
            <!--end::Select2-->
            <!--begin::Description-->
            <div class="text-muted fs-7">Tek bir ürünün nasıl görüntüleneceğini tanımlamak için mevcut temanızdan bir şablon atayın.</div>
            <!--end::Description-->
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Template settings-->

</div>
<!--end::Aside column-->
