<div class="tab-pane fade" id="kt_tab_pane_other" role="tabpanel">

    <div class="fv-row mb-7">
        <!--begin::Label-->
        <label class="required fs-6 fw-semibold mb-2">Kullanıcı Görseli (60 * 60)</label>
        <!--end::Label-->
        <!--begin::Input-->
        <input type="file" class="form-control form-control-solid" placeholder="" name="image" value="" />
        <!--end::Input-->
    </div>
    <div class="fv-row mb-7">
        <!--begin::Label-->
        <label class="required fs-6 fw-semibold mb-2">Blog</label>
        <!--end::Label-->
        <!--begin::Input-->
        <select class="form-control form-control-solid"  name="blog_id">
            <option value="">Blog Seçiniz</option>
            @foreach($blogs as $blog)
                <option value="{{$blog->id}}">{{$blog->getName()}}</option>
            @endforeach
        </select>
        <!--end::Input-->
    </div>
</div>
