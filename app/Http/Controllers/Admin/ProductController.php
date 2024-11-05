<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductTemplate;
use App\Models\ProductVariation;
use App\Models\SubCategory;
use App\Models\Tag;
use App\Models\Variant;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.product.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mainCategories = SubCategory::all();//veya MainCategory
        $tags = Tag::all()->pluck('name')->toArray();// etiketler
        $templates = ProductTemplate::all();
        $variations = Variant::all();
        return view('admin.product.create.index', compact('mainCategories', 'tags', 'templates', 'variations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function datatable()
    {
        $productCategories = Product::latest();

        return DataTables::of($productCategories)
            ->editColumn('id', function ($q) {
                return createCheckbox($q->id, 'Product', 'Ürünleri');
            })
            ->editColumn('name', function ($q) {
                return $q->name;
            })
            ->editColumn('price', function ($q) {
                return formatPrice($q->price);
            })
            ->editColumn('status', function ($q) {
                return create_switch($q->id, $q->status == 1 ? true : false, 'Product', 'status');
            })
            ->addColumn('action', function ($q) {
                $html = '<div class="d-flex justify-content-center align-items-center">';
                $html .= create_edit_button(route('admin.subCategoryProduct.edit', $q->id));
                $html .= create_delete_button('Product', $q->id, 'Ürün', 'Ürün Kaydını Silmek İstediğinize Eminmisiniz?');
                $html .= '</div>';

                return $html;
            })
            ->rawColumns(['id', 'action', 'created_at'])
            ->make(true);
    }
}
