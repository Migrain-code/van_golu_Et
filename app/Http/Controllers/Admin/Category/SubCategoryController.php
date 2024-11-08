<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.category.subcategory.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::where('status', 1)->get();
        return view('admin.category.subcategory.create.index', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $subCategory = new SubCategory();
        $subCategory->name = $request->title;
        $subCategory->meta_title = $request->meta_title;
        $subCategory->meta_description = $request->meta_description;
        $subCategory->category_id = $request->category_id;
        $slugs = [];
        foreach ($request->title as $locale => $title) {
            $slugs[$locale] = Str::slug($title);
        }
        $subCategory->slug = $slugs;
        if ($request->hasFile('image')) {
            $subCategory->image = $request->file('image')->store('subCategoryImages');
        }
        if ($subCategory->save()) {
            return redirect()->route('admin.subcategory.index')->with('response', [
                'status' => 'success',
                'message' => 'Kategori Başarılı Bir Şekilde Oluşturuldu'
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubCategory $subcategory)
    {
        $subCategory = $subcategory;
        $categories = Category::where('status', 1)->get();
        return view('admin.category.subcategory.edit.index', compact('subCategory','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SubCategory $subcategory)
    {
        $subCategory = $subcategory;
        $subCategory->name = $request->title;
        $subCategory->meta_title = $request->meta_title;
        $subCategory->meta_description = $request->meta_description;
        $subCategory->category_id = $request->category_id;
        $slugs = [];
        foreach ($request->title as $locale => $title) {
            $slugs[$locale] = Str::slug($title);
        }
        $subCategory->slug = $slugs;
        if ($request->hasFile('image')) {
            $subCategory->image = $request->file('image')->store('subCategoryImages');
        }
        if ($subCategory->save()) {
            return redirect()->route('admin.subcategory.index')->with('response', [
                'status' => 'success',
                'message' => 'Kategori Başarılı Bir Şekilde Güncellendi'
            ]);
        }
    }

    public function datatable()
    {
        $data = SubCategory::latest();

        return DataTables::of($data)
            ->editColumn('id', function ($q) {
                return createCheckbox($q->id, 'SubCategory', 'Kategorileri');
            })
            ->editColumn('name', function ($q) {
                return $q->getName();
            })
            ->editColumn('meta_title', function ($q) {
                return $q->getMetaTitle();
            })
            ->editColumn('status', function ($q) {
                return create_switch($q->id, $q->status == 1 ? true : false, 'SubCategory', 'status');
            })
            ->editColumn('created_at', function ($q) {
                return $q->created_at->format('d.m.Y H:i:s');
            })
            ->addColumn('action', function ($q) {
                $html = "";
                $html .= create_edit_button(route('admin.subcategory.edit', $q->id));
                $html .= create_delete_button('SubCategory', $q->id, 'Kategori', 'Kategori Kaydını Silmek İstediğinize Eminmisiniz?');
                return $html;
            })
            ->rawColumns(['id', 'action'])
            ->make(true);
    }

}
