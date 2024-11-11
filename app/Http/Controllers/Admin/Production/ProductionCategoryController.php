<?php

namespace App\Http\Controllers\Admin\Production;

use App\Http\Controllers\Controller;
use App\Models\ProductionCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class ProductionCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.category.production.index');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.production.create.index');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $productionCategory = new ProductionCategory();
        $productionCategory->name = $request->title;
        $productionCategory->meta_title = $request->meta_title;
        $productionCategory->meta_description = $request->meta_description;

        $slugs = [];
        foreach ($request->title as $locale => $title) {
            $slugs[$locale] = Str::slug($title);
        }
        $productionCategory->slug = $slugs;
        if ($request->hasFile('image')) {
            $productionCategory->image = $request->file('image')->store('categoryImages');
        }
        if ($productionCategory->save()) {
            return redirect()->route('admin.productionCategory.index')->with('response', [
                'status' => 'success',
                'message' => 'Kategori Başarılı Bir Şekilde Oluşturuldu'
            ]);
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductionCategory $productionCategory)
    {
        return view('admin.category.production.edit.index', compact('productionCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProductionCategory $productionCategory)
    {
        $productionCategory->name = $request->title;
        $productionCategory->meta_title = $request->meta_title;
        $productionCategory->meta_description = $request->meta_description;

        $slugs = [];
        foreach ($request->title as $locale => $title) {
            $slugs[$locale] = Str::slug($title);
        }
        $productionCategory->slug = $slugs;
        if ($request->hasFile('image')) {
            $productionCategory->image = $request->file('image')->store('categoryImages');
        }
        if ($productionCategory->save()) {
            return redirect()->route('admin.productionCategory.index')->with('response', [
                'status' => 'success',
                'message' => 'Kategori Başarılı Bir Şekilde Güncellendi'
            ]);
        }
    }

    public function datatable()
    {
        $data = ProductionCategory::latest();

        return DataTables::of($data)
            ->editColumn('id', function ($q) {
                return createCheckbox($q->id, 'ProductionCategory', 'Kategorileri');
            })
            ->editColumn('name', function ($q) {
                return $q->getName();
            })
            ->editColumn('meta_title', function ($q) {
                return $q->getMetaTitle();
            })
            ->editColumn('status', function ($q) {
                return create_switch($q->id, $q->status == 1 ? true : false, 'ProductionCategory', 'status');
            })
            ->editColumn('created_at', function ($q) {
                return $q->created_at->format('d.m.Y H:i:s');
            })
            ->addColumn('action', function ($q) {
                $html = "";
                $html .= create_edit_button(route('admin.productionCategory.edit', $q->id));
                $html .= create_delete_button('ProductionCategory', $q->id, 'Kategori', 'Kategori Kaydını Silmek İstediğinize Eminmisiniz?');
                return $html;
            })
            ->rawColumns(['id', 'action'])
            ->make(true);
    }

}
