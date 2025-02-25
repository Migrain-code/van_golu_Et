<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductReference;
use App\Models\Reference;
use App\Models\Series;
use App\Models\SubCategorySon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
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
        $categories = Category::all();

        return view('admin.product.create.index', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = new Product();
        $product->name = $request->title;
        $product->meta_title = $request->meta_title;
        $product->meta_description = $request->meta_description;
        $product->description = $request->short_description;
        $product->technic = $request->technic;
        $product->group_id = $request->category_id;
        $product->advantage = $request->advantage;
        $slugs = [];
        foreach ($request->title as $locale => $title) {
            $slugs[$locale] = Str::slug($title);
        }
        $product->slug = $slugs;
        if ($request->hasFile('image')) {
            $product->image = $request->file('image')->store('blogImages');
        }

        if ($product->save()) {

            return redirect()->route('admin.product.index')->with('response', [
                'status' => 'success',
                'message' => 'Ürün Başarıyla Eklendi'
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();

        return view('admin.product.edit.index', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $product->name = $request->title;
        $product->meta_title = $request->meta_title;
        $product->meta_description = $request->meta_description;
        $product->description = $request->short_description;
        $product->technic = $request->technic;
        $product->group_id = $request->category_id;
        $product->advantage = $request->advantage;
        $slugs = [];
        foreach ($request->title as $locale => $title) {
            $slugs[$locale] = Str::slug($title);
        }
        $product->slug = $slugs;
        if ($request->hasFile('image')) {
            $product->image = $request->file('image')->store('blogImages');
        }
        if ($product->save()) {
            return redirect()->route('admin.product.index')->with('response', [
                'status' => 'success',
                'message' => 'Ürün Başarıyla Güncellendi'
            ]);
        }
    }

    public function datatable()
    {
        $data = Product::orderBy('id', 'asc');

        return DataTables::of($data)
            ->editColumn('id', function ($q) {
                return createCheckbox($q->id, 'Product', 'Ürünleri');
            })
            ->editColumn('name', function ($q) {
                return $q->getName();
            })
            ->editColumn('status', function ($q) {
                return create_switch($q->id, $q->status == 1 ? true : false, 'Product', 'status');
            })
            ->editColumn('meta_title', function ($q) {
                return $q->getMetaTitle();
            })
            ->editColumn('created_at', function ($q) {
                return $q->created_at->format('d.m.Y H:i:s');
            })
            ->addColumn('action', function ($q) {
                $html = "";
                $html .= create_edit_button(route('admin.product.edit', $q->id));
                $html .= create_delete_button('Product', $q->id, 'Ürün', 'Ürün Kaydını Silmek İstediğinize Eminmisiniz?');
                return $html;
            })
            ->rawColumns(['id', 'action'])
            ->make(true);
    }

}
