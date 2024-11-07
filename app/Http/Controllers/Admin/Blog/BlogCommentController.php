<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogComment;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class BlogCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.blog-comment.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $blogs = Blog::where('status', 1)->get();
        return view('admin.blog-comment.create.index', compact('blogs'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $blogComment = new BlogComment();
        $blogComment->username = $request->title;
        $blogComment->comment = $request->comment;
        $blogComment->blog_id = $request->blog_id;

        if ($request->hasFile('image')) {
            $blogComment->image = $request->file('image')->store('blogCommentImages');
        }
        if ($blogComment->save()) {
            return redirect()->route('admin.blog-comment.index')->with('response', [
                'status' => 'success',
                'message' => 'Yorum Başarıyla Eklendi'
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BlogComment $blogComment)
    {
        $blogs = Blog::where('status', 1)->get();

        return view('admin.blog-comment.edit.index', compact('blogComment', 'blogs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BlogComment $blogComment)
    {
        $blogComment->username = $request->title;
        $blogComment->comment = $request->comment;
        $blogComment->blog_id = $request->blog_id;

        if ($request->hasFile('image')) {
            $blogComment->image = $request->file('image')->store('blogCommentImages');
        }
        if ($blogComment->save()) {
            return redirect()->route('admin.blog-comment.index')->with('response', [
                'status' => 'success',
                'message' => 'Yorum Başarıyla Güncellendi'
            ]);
        }
    }


    public function datatable()
    {
        $data = BlogComment::latest();

        return DataTables::of($data)
            ->editColumn('id', function ($q) {
                return createCheckbox($q->id, 'BlogComment', 'Yorumları');
            })
            ->addColumn('name', function ($q) {
                return $q->blog->getName();
            })
            ->editColumn('username', function ($q) {
                return $q->getUserName();
            })
            ->editColumn('status', function ($q) {
                return create_switch($q->id, $q->status == 1 ? true : false, 'BlogComment', 'status');
            })
            ->editColumn('created_at', function ($q) {
                return $q->created_at->format('d.m.Y H:i:s');
            })
            ->addColumn('action', function ($q) {
                $html = "";
                $html .= create_edit_button(route('admin.blog-comment.edit', $q->id));
                $html .= create_delete_button('Blog', $q->id, 'Yorum', 'Yorum Kaydını Silmek İstediğinize Eminmisiniz?');
                return $html;
            })
            ->rawColumns(['id', 'action'])
            ->make(true);
    }

}
