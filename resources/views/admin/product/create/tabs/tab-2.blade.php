<!--begin::Tab pane-->
<div class="tab-pane fade" id="kt_ecommerce_add_product_advanced" role="tab-panel">
    <div class="d-flex flex-column gap-7 gap-lg-10">
        <!--begin::Inventory-->
        <div class="card card-flush py-4">
            <!--begin::Card header-->
            <div class="card-header">
                <div class="card-title">
                    <h2>Envanter</h2>
                </div>
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body pt-0">
                <!--begin::Input group-->
                <div class="mb-10 fv-row">
                    <!--begin::Label-->
                    <label class="required form-label">Stok Kodu</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="text" name="sku" class="form-control mb-2" placeholder="SKU Numarası" value="" />
                    <!--end::Input-->
                    <!--begin::Description-->
                    <div class="text-muted fs-7">Ürün SKU'sunu girin.</div>
                    <!--end::Description-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="mb-10 fv-row">
                    <!--begin::Label-->
                    <label class="required form-label">Barkod</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="text" name="barcode" class="form-control mb-2" placeholder="Barcode Number" value="" />
                    <!--end::Input-->
                    <!--begin::Description-->
                    <div class="text-muted fs-7">Ürün barkod numarasını girin.</div>
                    <!--end::Description-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="mb-10 fv-row">
                    <!--begin::Label-->
                    <label class="required form-label">Adet</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <div class="d-flex gap-3">
                        <input type="number" name="shelf" class="form-control mb-2" placeholder="Rafta" value="" />
                        <input type="number" name="warehouse" class="form-control mb-2" placeholder="Depoda" />
                    </div>
                    <!--end::Input-->
                    <!--begin::Description-->
                    <div class="text-muted fs-7">Ürün miktarını girin.</div>
                    <!--end::Description-->
                </div>
                <!--end::Input group-->
            </div>
            <!--end::Card header-->
        </div>
        <!--end::Inventory-->
        <!--begin::Shipping-->
        <div class="card card-flush py-4">
            <!--begin::Card header-->
            <div class="card-header">
                <div class="card-title">
                    <h2>Kargo Bilgileri</h2>
                </div>
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body pt-0">
                <!--begin::Input group-->
                <div class="fv-row">
                    <!--begin::Input-->
                    <div class="form-check form-check-custom form-check-solid mb-2">
                        <input class="form-check-input" type="checkbox" name="product_type" id="kt_ecommerce_add_product_shipping_checkbox" value="1" />
                        <label class="form-check-label">
                            Bu fiziksel bir üründür
                        </label>
                    </div>
                    <!--end::Input-->
                    <!--begin::Description-->
                    <div class="text-muted fs-7">Ürünün fiziksel mi yoksa dijital bir ürün mü olduğunu ayarlayın. Fiziksel ürünler nakliye gerektirebilir.
                        .</div>
                    <!--end::Description-->
                </div>
                <!--end::Input group-->
                <!--begin::Shipping form-->
                <div id="kt_ecommerce_add_product_shipping" class="d-none mt-10">
                    <!--begin::Input group-->
                    <div class="mb-10 fv-row">
                        <!--begin::Label-->
                        <label class="form-label">Ağırlık</label>
                        <!--end::Label-->
                        <!--begin::Editor-->
                        <input type="text" name="weight" class="form-control mb-2" placeholder="Ürün Ağırlığı" value="" />
                        <!--end::Editor-->
                        <!--begin::Description-->
                        <div class="text-muted fs-7">Ürün ağırlığını kilogram (kg) cinsinden ayarlayın.</div>
                        <!--end::Description-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row">
                        <!--begin::Label-->
                        <label class="form-label">Boyut</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <div class="d-flex flex-wrap flex-sm-nowrap gap-3">
                            <input type="number" name="width" class="form-control mb-2" placeholder="Genişlik (w)" value="" />
                            <input type="number" name="height" class="form-control mb-2" placeholder="Yükseklik (h)" value="" />
                            <input type="number" name="length" class="form-control mb-2" placeholder="Uzunluk (l)" value="" />
                        </div>
                        <!--end::Input-->
                        <!--begin::Description-->
                        <div class="text-muted fs-7">Ürün ölçülerini santimetre (cm) cinsinden giriniz.</div>
                        <!--end::Description-->
                    </div>
                    <!--end::Input group-->
                </div>
                <!--end::Shipping form-->
            </div>
            <!--end::Card header-->
        </div>
        <!--end::Shipping-->
        <!--begin::Meta options-->
        <div class="card card-flush py-4">
            <!--begin::Card header-->
            <div class="card-header">
                <div class="card-title">
                    <h2>Meta Seçenekleri</h2>
                </div>
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body pt-0">
                <!--begin::Input group-->
                <div class="mb-10">
                    <!--begin::Label-->
                    <label class="form-label">Meta Etiket Başlığı</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="text" class="form-control mb-2" name="meta_title" placeholder="Meta Etiket Başlığı" />
                    <!--end::Input-->
                    <!--begin::Description-->
                    <div class="text-muted fs-7">Bir meta etiket başlığı ayarlayın. Basit ve kesin anahtar kelimeler olması önerilir.
                        .</div>
                    <!--end::Description-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="mb-10">
                    <!--begin::Label-->
                    <label class="form-label">Meta Tag Açıklama

                    </label>
                    <!--end::Label-->
                    <!--begin::Editor-->
                    <div id="kt_ecommerce_add_product_meta_description" class="min-h-100px mb-2"></div>
                    <!--end::Editor-->
                    <!--begin::Description-->
                    <div class="text-muted fs-7">Artan SEO sıralaması için ürüne bir meta etiket açıklaması ayarlayın.
                        .</div>
                    <!--end::Description-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div>
                    <!--begin::Label-->
                    <label class="form-label">Meta Etiket Anahtar Kelimeleri</label>
                    <!--end::Label-->
                    <!--begin::Editor-->
                    <input id="kt_ecommerce_add_product_meta_keywords" name="meta_keywords" class="form-control mb-2" />
                    <!--end::Editor-->
                    <!--begin::Description-->
                    <div class="text-muted fs-7">
                        Ürünün ilgili olduğu anahtar kelimelerin bir listesini ayarlayın.
                        Anahtar kelimeleri, her anahtar kelimenin arasına virgül ekleyerek ayırın
                        <code>,</code></div>
                    <!--end::Description-->
                </div>
                <!--end::Input group-->
            </div>
            <!--end::Card header-->
        </div>
        <!--end::Meta options-->
    </div>
</div>
<!--end::Tab pane-->
