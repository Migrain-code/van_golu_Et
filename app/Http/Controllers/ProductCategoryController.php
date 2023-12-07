<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class ProductCategoryController extends Controller
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
        $productCategory = new ProductCategory();
        $productCategory->name = $request->name;
        $productCategory->status = 0;
        $productCategory
            ->setTranslation('slug', 'de', Str::slug($request->name['de']))
            ->setTranslation('slug', 'en', Str::slug($request->name['en']))
            ->setTranslation('slug', 'es', Str::slug($request->name['es']))
            ->setTranslation('slug', 'fr', Str::slug($request->name['fr']))
            ->setTranslation('slug', 'it', Str::slug($request->name['it']))
            ->setTranslation('slug', 'tr', Str::slug($request->name['tr']));

        if ($productCategory->save()){
            return response()->json([
                'status' => "success",
                'message' => "Ürün Kategorisi Eklendi"
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductCategory $productCategory)
    {
        return view('category.product-category.detail.edit', compact('productCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProductCategory $productCategory)
    {
        $productCategory->name = $request->name;
        $productCategory->status = 0;
        $productCategory
            ->setTranslation('slug', 'de', Str::slug($request->name['de']))
            ->setTranslation('slug', 'en', Str::slug($request->name['en']))
            ->setTranslation('slug', 'es', Str::slug($request->name['es']))
            ->setTranslation('slug', 'fr', Str::slug($request->name['fr']))
            ->setTranslation('slug', 'it', Str::slug($request->name['it']))
            ->setTranslation('slug', 'tr', Str::slug($request->name['tr']));

        if ($productCategory->save()){
            return to_route('admin.productCategory.index')->with('response',[
                'status' => "success",
                'message' => "Ürün Kategorisi Güncellendi"
            ]);
        }
    }

    public function datatable()
    {
        $productCategories = ProductCategory::latest();

        return DataTables::of($productCategories)
            ->editColumn('id', function ($q) {
                return createCheckbox($q->id, 'ProductCategory', 'İşletme Kategorisini');
            })
            ->editColumn('name', function ($q) {
                return $q->getName();
            })
            ->editColumn('created_at', function ($q) {
                return $q->created_at->format('d.m.Y H:i:s');
            })
            ->editColumn('status', function ($q) {
                return create_switch($q->id, $q->status == 1 ? true : false, 'ProductCategory', 'status');
            })
            ->addColumn('products', function ($q) {
                return $q->products->count();
            })
            ->addColumn('action', function ($q) {
                $html = '<div class="d-flex justify-content-center align-items-center">';
                $html .= create_edit_button(route('admin.productCategory.edit', $q->id));
                $html .= create_delete_button('ProductCategory', $q->id, 'Kategori', 'Kategori Kaydını Silmek İstediğinize Eminmisiniz?');
                $html .= '</div>';

                return $html;
            })
            ->rawColumns(['id', 'action', 'created_at'])
            ->make(true);
    }
}
