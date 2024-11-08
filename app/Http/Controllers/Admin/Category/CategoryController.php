<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.category.parent.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.parent.create.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $category = new Category();
        $category->name = $request->title;
        $category->meta_title = $request->meta_title;
        $category->meta_description = $request->meta_description;

        $slugs = [];
        foreach ($request->title as $locale => $title) {
            $slugs[$locale] = Str::slug($title);
        }
        $category->slug = $slugs;
        if ($request->hasFile('image')) {
            $category->image = $request->file('image')->store('categoryImages');
        }
        if ($category->save()) {
            return redirect()->route('admin.category.index')->with('response', [
                'status' => 'success',
                'message' => 'Kategori Başarılı Bir Şekilde Oluşturuldu'
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.category.parent.edit.index', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $category->name = $request->title;
        $category->meta_title = $request->meta_title;
        $category->meta_description = $request->meta_description;

        $slugs = [];
        foreach ($request->title as $locale => $title) {
            $slugs[$locale] = Str::slug($title);
        }
        $category->slug = $slugs;
        if ($request->hasFile('image')) {
            $category->image = $request->file('image')->store('categoryImages');
        }
        if ($category->save()) {
            return redirect()->route('admin.category.index')->with('response', [
                'status' => 'success',
                'message' => 'Kategori Başarılı Bir Şekilde Güncellendi'
            ]);
        }
    }

    public function datatable()
    {
        $data = Category::latest();

        return DataTables::of($data)
            ->editColumn('id', function ($q) {
                return createCheckbox($q->id, 'Category', 'Kategorileri');
            })
            ->editColumn('name', function ($q) {
                return $q->getName();
            })
            ->editColumn('meta_title', function ($q) {
                return $q->getMetaTitle();
            })
            ->editColumn('status', function ($q) {
                return create_switch($q->id, $q->status == 1 ? true : false, 'Category', 'status');
            })
            ->editColumn('created_at', function ($q) {
                return $q->created_at->format('d.m.Y H:i:s');
            })
            ->addColumn('action', function ($q) {
                $html = "";
                $html .= create_edit_button(route('admin.category.edit', $q->id));
                $html .= create_delete_button('Category', $q->id, 'Kategori', 'Kategori Kaydını Silmek İstediğinize Eminmisiniz?');
                return $html;
            })
            ->rawColumns(['id', 'action'])
            ->make(true);
    }

}
