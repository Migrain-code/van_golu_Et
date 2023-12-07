<?php

namespace App\Http\Controllers;

use App\Models\ProductAds;
use App\Models\ProductCategory;
use App\Services\UploadFile;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ProductAdsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = ProductCategory::all();
        return view('product-ads.index', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $productAdvert = new ProductAds();
        $productAdvert->name = $request->product_name;
        $productAdvert->price = $request->price;
        $productAdvert->link = $request->input('link');
        $productAdvert->category_id = $request->input('category_id');
        if ($request->hasFile('image')) {
            $response = UploadFile::uploadFile($request->file('image'), 'productAdsImages');
            $productAdvert->image = $response["image"]["way"];
        }
        if ($productAdvert->save()){
            return response()->json([
                'status' => "success",
                'message' => "Ürün Reklamı Başarılı Bir Şekilde Eklendi"
            ]);
        } else{
            return response()->json([
                'status' => "warning",
                'message' => "Ürün Reklamı Bir Hata Sebebi İle Eklenemedi"
            ]);
        }

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductAds $productAdvert)
    {
        $categories = ProductCategory::all();
        return view('product-ads.detail.edit', compact('productAdvert', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProductAds $productAdvert)
    {
        $productAdvert->name = $request->product_name;
        $productAdvert->price = $request->price;
        $productAdvert->link = $request->input('link');
        $productAdvert->category_id = $request->input('category_id');
        if ($request->hasFile('image')) {
            $response = UploadFile::uploadFile($request->file('image'), 'productAdsImages');
            $productAdvert->image = $response["image"]["way"];
        }
        if ($productAdvert->save()){
            return to_route('admin.productAdvert.index')->with('response', [
                'status' => "success",
                'message' => "Ürün Reklamı Başarılı Bir Şekilde Güncellendi"
            ]);
        } else{
            return back()->with('response', [
                'status' => "warning",
                'message' => "Ürün Reklamı Bir Hata Sebebi İle Güncellenemedi"
            ]);
        }
    }

    public function datatable()
    {
        $ads = ProductAds::latest();

        return DataTables::of($ads)
            ->editColumn('id', function ($q) {
                return createCheckbox($q->id, 'ProductAds', 'Reklamları');
            })
            ->editColumn('name', function ($q) {
                return $q->getName();
            })
            ->editColumn('category_id', function ($q) {
                return $q->category->name;
            })
            ->editColumn('status', function ($q) {
                return create_switch($q->id, $q->status == 1 ? true : false, 'ProductAds', 'status');
            })
            ->editColumn('created_at', function ($q) {
                return $q->created_at->format('d.m.Y H:i:s');
            })
            ->addColumn('action', function ($q) {
                $html = "";
                $html .= create_edit_button(route('admin.productAdvert.edit', $q->id));
                $html .= create_delete_button('ProductAds', $q->id, 'Reklam', 'Reklam Kaydını Silmek İstediğinize Eminmisiniz?');
                return $html;
            })
            ->rawColumns(['id', 'action'])
            ->make(true);
    }
}
