<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.blog-category.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blog-category.create.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $blogCategory = new BlogCategory();
        $blogCategory->name = $request->title;
        $blogCategory->meta_title = $request->meta_title;
        $blogCategory->meta_description = $request->meta_description;

        $slugs = [];
        foreach ($request->title as $locale => $title) {
            $slugs[$locale] = Str::slug($title);
        }
        $blogCategory->slug = $slugs;
        if ($request->hasFile('image')) {
            $blogCategory->image = $request->file('image')->store('blogCategoryImages');
        }

        if ($blogCategory->save()) {
            return redirect()->route('admin.blog-category.index')->with('response', [
                'status' => 'success',
                'message' => 'Blog Kategorisi Başarıyla Eklendi'
            ]);
        }

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BlogCategory $blogCategory)
    {
        return view('admin.blog-category.edit.index', compact('blogCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BlogCategory $blogCategory)
    {
        $blogCategory->name = $request->title;
        $blogCategory->meta_title = $request->meta_title;
        $blogCategory->meta_description = $request->meta_description;

        $slugs = [];
        foreach ($request->title as $locale => $title) {
            $slugs[$locale] = Str::slug($title);
        }
        $blogCategory->slug = $slugs;
        if ($request->hasFile('image')) {
            $blogCategory->image = $request->file('image')->store('blogCategoryImages');
        }

        if ($blogCategory->save()) {
            return redirect()->route('admin.blog-category.index')->with('response', [
                'status' => 'success',
                'message' => 'Blog Kategorisi Başarıyla Güncellendi'
            ]);
        }
    }

    public function datatable()
    {
        $data = BlogCategory::latest();

        return DataTables::of($data)
            ->editColumn('id', function ($q) {
                return createCheckbox($q->id, 'BlogCategory', 'Kategorileri');
            })
            ->editColumn('name', function ($q) {
                return $q->getName();
            })
            ->editColumn('meta_title', function ($q) {
                return $q->getMetaTitle();
            })
            ->editColumn('status', function ($q) {
                return create_switch($q->id, $q->status == 1 ? true : false, 'BlogCategory', 'status');
            })
            ->editColumn('created_at', function ($q) {
                return $q->created_at->format('d.m.Y H:i:s');
            })
            ->addColumn('action', function ($q) {
                $html = "";
                $html .= create_edit_button(route('admin.blog-category.edit', $q->id));
                $html .= create_delete_button('BlogCategory', $q->id, 'Kategori', 'Kategori Kaydını Silmek İstediğinize Eminmisiniz?');
                return $html;
            })
            ->rawColumns(['id', 'action'])
            ->make(true);
    }
}
