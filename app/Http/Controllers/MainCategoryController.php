<?php

namespace App\Http\Controllers;

use App\Models\MainCategory;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class MainCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('category.product-category.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $mainCategory = new MainCategory();

        $this->extracted($request, $mainCategory);
        return response()->json([
            'status' => "success",
            'message' => "Kategori Eklendi"
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MainCategory $mainCategory)
    {
        return view('category.product-category.detail.edit', compact('mainCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MainCategory $mainCategory)
    {

        $this->extracted($request, $mainCategory);
        return to_route('admin.mainCategory.index')->with('response',[
            'status' => "success",
            'message' => "Kategori Güncllendi"
        ]);

    }

    public function extracted($request, $mainCategory)
    {
        $mainCategory->name = $request->input('name');
        $mainCategory->slug = Str::slug($request->input('name'));
        $mainCategory->meta_title= $request->input('meta_title');
        $mainCategory->meta_description = $request->input('meta_description');
        $mainCategory->save();
        return $mainCategory;
    }
    public function datatable()
    {
        $productCategories = MainCategory::latest();

        return DataTables::of($productCategories)
            ->editColumn('id', function ($q) {
                return createCheckbox($q->id, 'MainCategory', 'Ana Kategorileri');
            })
            ->editColumn('name', function ($q) {
                return $q->name;
            })
            ->editColumn('created_at', function ($q) {
                return $q->created_at->format('d.m.Y H:i:s');
            })
            ->editColumn('status', function ($q) {
                return create_switch($q->id, $q->status == 1 ? true : false, 'MainCategory', 'status');
            })
            ->addColumn('action', function ($q) {
                $html = '<div class="d-flex justify-content-center align-items-center">';
                $html .= create_edit_button(route('admin.mainCategory.edit', $q->id));
                $html .= create_delete_button('MainCategory', $q->id, 'Kategori', 'Kategori Kaydını Silmek İstediğinize Eminmisiniz?');
                $html .= '</div>';

                return $html;
            })
            ->rawColumns(['id', 'action', 'created_at'])
            ->make(true);
    }


}
