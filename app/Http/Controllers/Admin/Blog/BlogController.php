<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.blog.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = BlogCategory::all();
        return view('admin.blog.create.index', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //$request->dd();
        $blog = new Blog();
        $blog->name = $request->title;
        $blog->meta_title = $request->meta_title;
        $blog->meta_description = $request->meta_description;
        $blog->content = $request->meta_content;
        $blog->category_id = $request->category_id;
        $slugs = [];
        foreach ($request->title as $locale => $title) {
            $slugs[$locale] = Str::slug($title);
        }
        $blog->slug = $slugs;
        if ($request->hasFile('image')) {
            $blog->image = $request->file('image')->store('blogImages');
        }
        if ($blog->save()) {
            return redirect()->route('admin.blog.index')->with('response', [
                'status' => 'success',
                'message' => 'Blog Başarıyla Eklendi'
            ]);
        }

    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        $categories = BlogCategory::all();
        return view('admin.blog.edit.index', compact('blog', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        $blog->name = $request->title;
        $blog->meta_title = $request->meta_title;
        $blog->meta_description = $request->meta_description;
        $blog->content = $request->meta_content;
        $blog->category_id = $request->category_id;

        $slugs = [];
        foreach ($request->title as $locale => $title) {
            $slugs[$locale] = Str::slug($title);
        }
        $blog->slug = $slugs;
        if ($request->hasFile('image')) {
            $blog->image = $request->file('image')->store('blogImages');
        }
        if ($blog->save()) {
            return redirect()->route('admin.blog.index')->with('response', [
                'status' => 'success',
                'message' => 'Blog Başarıyla Güncellendi'
            ]);
        }
    }

    public function datatable()
    {
        $data = Blog::latest();

        return DataTables::of($data)
            ->editColumn('id', function ($q) {
                return createCheckbox($q->id, 'Blog', 'Blogları');
            })
            ->editColumn('name', function ($q) {
                return $q->getName();
            })
            ->editColumn('status', function ($q) {
                return create_switch($q->id, $q->status == 1 ? true : false, 'Blog', 'status');
            })
            ->editColumn('is_main_page', function ($q) {
                return create_switch($q->id, $q->is_main_page == 1 ? true : false, 'Blog', 'is_main_page');
            })
            ->editColumn('created_at', function ($q) {
                return $q->created_at->format('d.m.Y H:i:s');
            })
            ->addColumn('action', function ($q) {
                $html = "";
                $html .= create_edit_button(route('admin.blog.edit', $q->id));
                $html .= create_delete_button('Blog', $q->id, 'Blog', 'Blog Kaydını Silmek İstediğinize Eminmisiniz?');
                return $html;
            })
            ->rawColumns(['id', 'action'])
            ->make(true);
    }

}
