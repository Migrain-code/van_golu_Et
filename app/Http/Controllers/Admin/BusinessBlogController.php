<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BusinessBlog;
use App\Models\Category;
use App\Services\UploadFile;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class BusinessBlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.blog-business.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $businessBlog = new BusinessBlog();
        $businessBlog->category_id = $request->input('category_id');
        $businessBlog->titles = $request->title;
        $businessBlog->descriptions = $request->description;
        $businessBlog->meta_titles = $request->meta_title;
        $businessBlog
            ->setTranslation('slug', 'de', Str::slug($request->title['de']))
            ->setTranslation('slug', 'en', Str::slug($request->title['en']))
            ->setTranslation('slug', 'es', Str::slug($request->title['es']))
            ->setTranslation('slug', 'fr', Str::slug($request->title['fr']))
            ->setTranslation('slug', 'it', Str::slug($request->title['it']))
            ->setTranslation('slug', 'tr', Str::slug($request->title['tr']));

        if ($request->hasFile('image')) {
            $response = UploadFile::uploadFile($request->file('image'), 'businessBlogImages');
            $businessBlog->image = $response["image"]["way"];
        }
        if ($businessBlog->save()) {
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
    public function edit(BusinessBlog $businessBlog)
    {
        $categories = Category::all();
        return view('admin.blog-business.detail.edit', compact('businessBlog', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BusinessBlog $businessBlog)
    {
        $businessBlog->category_id = $request->input('category_id');
        $businessBlog->titles = $request->title;
        $businessBlog->descriptions = $request->description;
        $businessBlog->meta_titles = $request->meta_title;
        $businessBlog
            ->setTranslation('slug', 'de', Str::slug($request->title['de']))
            ->setTranslation('slug', 'en', Str::slug($request->title['en']))
            ->setTranslation('slug', 'es', Str::slug($request->title['es']))
            ->setTranslation('slug', 'fr', Str::slug($request->title['fr']))
            ->setTranslation('slug', 'it', Str::slug($request->title['it']))
            ->setTranslation('slug', 'tr', Str::slug($request->title['tr']));

        if ($request->hasFile('image')) {
            $response = UploadFile::uploadFile($request->file('image'), 'main_page_images');
            $businessBlog->image = $response["image"]["way"];
        }
        if ($businessBlog->save()) {
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
        $businessBlogs = BusinessBlog::latest();

        return DataTables::of($businessBlogs)
            ->editColumn('id', function ($q) {
                return createCheckbox($q->id, 'Blog', 'Alanı');
            })
            ->editColumn('status', function ($q) {
                return create_switch($q->id, $q->status == 1 ? true : false, 'BusinessBlog', 'status');
            })
            ->editColumn('titles', function ($q) {
                return $q->getTitle();
            })
            ->editColumn('meta_titles', function ($q) {
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
                $html .= create_edit_button(route('admin.businessBlog.edit', $q->id));
                $html .= create_delete_button('BusinessBlog', $q->id, 'Blog', 'Blog Kaydını Silmek İstediğinize Eminmisiniz?');
                return $html;
            })
            ->rawColumns(['id', 'action'])
            ->make(true);
    }
}
