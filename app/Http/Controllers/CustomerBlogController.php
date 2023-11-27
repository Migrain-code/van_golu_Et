<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Services\UploadFile;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class CustomerBlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('blog-customer.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $blogCustomer = new Blog();
        $blogCustomer->category_id = $request->input('category_id');
        $blogCustomer->titles = $request->title;
        $blogCustomer->descriptions = $request->description;
        $blogCustomer->meta_titles = $request->meta_title;
        $blogCustomer
            ->setTranslation('slug', 'de', Str::slug($request->title['de']))
            ->setTranslation('slug', 'en', Str::slug($request->title['en']))
            ->setTranslation('slug', 'es', Str::slug($request->title['es']))
            ->setTranslation('slug', 'fr', Str::slug($request->title['fr']))
            ->setTranslation('slug', 'it', Str::slug($request->title['it']))
            ->setTranslation('slug', 'tr', Str::slug($request->title['tr']));

        if ($request->hasFile('image')) {
            $response = UploadFile::uploadFile($request->file('image'), 'main_page_images');
            $blogCustomer->image = $response["image"]["way"];
        }
        if ($blogCustomer->save()) {
            return response()->json([
                'status' => "success",
                'message' => "Blog Başarılı Bir Şekilde Eklendi"
            ]);
        } else {
            return response()->json([
                'status' => "warning",
                'message' => "Blog Bir Hata Sebebi İle Eklenemedi"
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $customerBlog)
    {
        $categories = Category::all();
        return view('blog-customer.detail.edit', compact('customerBlog', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $customerBlog)
    {
        $customerBlog->category_id = $request->input('category_id');
        $customerBlog->titles = $request->title;
        $customerBlog->descriptions = $request->description;
        $customerBlog->meta_titles = $request->meta_title;
        $customerBlog
            ->setTranslation('slug', 'de', Str::slug($request->title['de']))
            ->setTranslation('slug', 'en', Str::slug($request->title['en']))
            ->setTranslation('slug', 'es', Str::slug($request->title['es']))
            ->setTranslation('slug', 'fr', Str::slug($request->title['fr']))
            ->setTranslation('slug', 'it', Str::slug($request->title['it']))
            ->setTranslation('slug', 'tr', Str::slug($request->title['tr']));

        if ($request->hasFile('image')) {
            $response = UploadFile::uploadFile($request->file('image'), 'main_page_images');
            $customerBlog->image = $response["image"]["way"];
        }
        if ($customerBlog->save()) {
            return to_route('admin.customerBlog.index')->with('response', [
                'status' => "success",
                'message' => "Blog Başarılı Bir Şekilde Güncellendi"
            ]);
        } else {
            return to_route('admin.customerBlog.index')->with('response', [
                'status' => "warning",
                'message' => "Blog Bir Hata Sebebi İle Güncellenmedi"
            ]);
        }
    }

    public function datatable()
    {
        $blogs = Blog::latest();

        return DataTables::of($blogs)
            ->editColumn('id', function ($q) {
                return createCheckbox($q->id, 'Blog', 'Alanı');
            })
            ->editColumn('status', function ($q) {
                return create_switch($q->id, $q->status == 1 ? true : false, 'Blog', 'status');
            })
            ->editColumn('titles', function ($q) {
                return $q->getTitle();
            })
            ->editColumn('meta_title', function ($q) {
                return $q->getMetaTitle();
            })
            ->editColumn('category_id', function ($q) {
                return $q->category->name;
            })
            ->editColumn('created_at', function ($q) {
                return $q->created_at->format('d.m.Y H:i:s');
            })
            ->addColumn('action', function ($q) {
                $html = "";
                $html .= create_edit_button(route('admin.customerBlog.edit', $q->id));
                $html .= create_delete_button('Blog', $q->id, 'Bölümü', 'Bölüm Kaydını Silmek İstediğinize Eminmisiniz?');
                return $html;
            })
            ->rawColumns(['id', 'action'])
            ->make(true);
    }
}
