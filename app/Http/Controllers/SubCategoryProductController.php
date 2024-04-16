<?php

namespace App\Http\Controllers;

use App\Models\MainCategory;
use App\Models\SubCategory;
use App\Models\SubCategoryProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class SubCategoryProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = SubCategory::all();
        return view('category.sub.index', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $subCategoryProduct = new SubCategoryProduct();

        $this->extracted($request, $subCategoryProduct);
        return response()->json([
            'status' => "success",
            'message' => "Kategori Eklendi"
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubCategoryProduct $subCategoryProduct)
    {
        $categories = SubCategory::all();
        return view('category.sub.detail.edit', compact('subCategoryProduct', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SubCategoryProduct $subCategoryProduct)
    {
        $this->extracted($request, $subCategoryProduct);
        return to_route('admin.subCategoryProduct.index')->with('response',[
            'status' => "success",
            'message' => "Kategori Güncellendi"
        ]);
    }

    public function extracted($request, $mainCategory)
    {
        $mainCategory->name = $request->input('name');
        $mainCategory->category_id = $request->input('category_id');
        $mainCategory->slug = Str::slug($request->input('name'));
        $mainCategory->meta_title= $request->input('meta_title');
        $mainCategory->meta_description = $request->input('meta_description');
        $mainCategory->save();
        return $mainCategory;
    }

    public function datatable()
    {
        $productCategories = SubCategoryProduct::latest();

        return DataTables::of($productCategories)
            ->editColumn('id', function ($q) {
                return createCheckbox($q->id, 'SubCategoryProduct', 'Alt Kategorileri');
            })
            ->editColumn('name', function ($q) {
                return $q->name;
            })
            ->addColumn('topCategory', function ($q) {
                return $q->topCategory->name;
            })
            ->editColumn('created_at', function ($q) {
                return $q->created_at->format('d.m.Y H:i:s');
            })
            ->editColumn('status', function ($q) {
                return create_switch($q->id, $q->status == 1 ? true : false, 'SubCategoryProduct', 'status');
            })
            ->addColumn('action', function ($q) {
                $html = '<div class="d-flex justify-content-center align-items-center">';
                $html .= create_edit_button(route('admin.subCategoryProduct.edit', $q->id));
                $html .= create_delete_button('SubCategoryProduct', $q->id, 'Kategori', 'Kategori Kaydını Silmek İstediğinize Eminmisiniz?');
                $html .= '</div>';

                return $html;
            })
            ->rawColumns(['id', 'action', 'created_at'])
            ->make(true);
    }
}
