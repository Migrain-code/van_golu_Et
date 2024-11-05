<div class="tab-pane fade" id="kt_tab_pane_3" role="tabpanel">

    <div class="fv-row mb-7">
        <label for="activity_gallery" class="drop-container">
            <div class="drop-title mb-3">Galeri Görselleri</div>
            <div class="custom-file-input">
                <span class="file-label"><span class="file-count">Görseli Buraya Sürükle veya seç</span></span>
                <input type="file" multiple name="activity_gallery[]" accept=".png, .jpg, .jpeg" id="activity_gallery" onchange="updateFileCount(this)">
            </div>
        </label>
    </div>
    <div class="fv-row mb-7">
        <label for="activity_slider" class="drop-container">
            <div class="drop-title mb-3">Slider Görselleri</div>
            <div class="custom-file-input">
                <span class="file-label"><span class="file-count">Görseli Buraya Sürükle veya seç</span></span>
                <input type="file" multiple name="activity_slider[]" accept=".png, .jpg, .jpeg" id="activity_slider" onchange="updateFileCount(this)">
            </div>
        </label>
    </div>

    <div class="row">
        <div class="col-6">
            <label>Slider Görselleri</label>
            <div class="tns" style="direction: ltr">
                <div data-tns="true" data-tns-nav-position="bottom" data-tns-mouse-drag="true" data-tns-controls="false">
                    @foreach($activity->sliders as $slider)
                        <div class="text-center px-5 pt-5 pt-lg-10 px-lg-10">
                            <img src="{{image($slider->image)}}" class="card-rounded shadow mw-100" alt="" />
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-6">
            <label>Galeri Görselleri</label>
            <div class="tns" style="direction: ltr">
                <div data-tns="true" data-tns-nav-position="bottom" data-tns-mouse-drag="true" data-tns-controls="false">
                    @foreach($activity->images as $gallery)
                        <div class="text-center px-5 pt-5 pt-lg-10 px-lg-10">
                            <img src="{{image($gallery->image)}}" class="card-rounded shadow mw-100" alt="" />
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>


</div>
