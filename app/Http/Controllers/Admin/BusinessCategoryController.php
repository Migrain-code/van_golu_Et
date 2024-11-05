<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BusinessCategory;
use App\Services\UploadFile;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class BusinessCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.category.business-category.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $businessCategory = new BusinessCategory();
        $businessCategory->name = $request->name;
        $businessCategory->meta_title = $request->title;
        $businessCategory->meta_description = $request->description;
        $businessCategory
            ->setTranslation('slug', 'de', Str::slug($request->name['de']))
            ->setTranslation('slug', 'en', Str::slug($request->name['en']))
            ->setTranslation('slug', 'es', Str::slug($request->name['es']))
            ->setTranslation('slug', 'fr', Str::slug($request->name['fr']))
            ->setTranslation('slug', 'it', Str::slug($request->name['it']))
            ->setTranslation('slug', 'tr', Str::slug($request->name['tr']));

        if ($request->hasFile('category_icon')) {
            $response = UploadFile::uploadFile($request->file('category_icon'), 'main_page_images');
            $businessCategory->icon = $response["image"]["way"];
        }

        if ($businessCategory->save()){
            return response()->json([
               'status' => "success",
               'message' => "İşletme Kategorisi Eklendi"
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BusinessCategory $businessCategory)
    {
        return view('admin.category.business-category.detail.edit', compact('businessCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BusinessCategory $businessCategory)
    {
        $businessCategory->name = $request->name;
        $businessCategory->meta_title = $request->title;
        $businessCategory->meta_description = $request->description;
        $businessCategory
            ->setTranslation('slug', 'de', Str::slug($request->name['de']))
            ->setTranslation('slug', 'en', Str::slug($request->name['en']))
            ->setTranslation('slug', 'es', Str::slug($request->name['es']))
            ->setTranslation('slug', 'fr', Str::slug($request->name['fr']))
            ->setTranslation('slug', 'it', Str::slug($request->name['it']))
            ->setTranslation('slug', 'tr', Str::slug($request->name['tr']));

        if ($request->hasFile('category_icon')) {
            $response = UploadFile::uploadFile($request->file('category_icon'), 'businessCategory_icons');
            $businessCategory->icon = $response["image"]["way"];
        }

        if ($businessCategory->save()){
            return to_route('admin.businessCategory.index')->with('response',[
                'status' => "success",
                'message' => "İşletme Kategorisi Güncellendi"
            ]);
        }
    }

    public function datatable()
    {
        $businessCategory = BusinessCategory::latest();

        return DataTables::of($businessCategory)
            ->editColumn('id', function ($q) {
                return createCheckbox($q->id, 'BusinessCategory', 'İşletme Kategorisini');
            })
            ->editColumn('name', function ($q) {
                return $q->getName();
            })
            ->editColumn('meta_title', function ($q) {
                return $q->getMetaTitle();
            })
            ->editColumn('icon', function ($q) {
                return html()->img(image($q->icon))->class('w-50px h-50px rounded object-fit-cover');
            })
            ->editColumn('created_at', function ($q) {
                return $q->created_at->format('d.m.Y H:i:s');
            })
            ->addColumn('action', function ($q) {
                $html = '<div class="d-flex justify-content-center align-items-center">';
                $html .= create_edit_button(route('admin.businessCategory.edit', $q->id));
                $html .= create_delete_button('BusinessCategory', $q->id, 'Kategori', 'Kategori Kaydını Silmek İstediğinize Eminmisiniz?');
                $html .= '</div>';

                return $html;
            })
            ->rawColumns(['id', 'action', 'created_at'])
            ->make(true);
    }

}
