<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Support\Facades\App;

class FBlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::where('status', 1)->paginate(2);
        $categories = BlogCategory::where('status', 1)->has('blogs')->get();
        $latestBlog = Blog::where('status', 1)->latest()->take(10)->get();
        return view('frontend.blog.index', compact('blogs', 'categories', 'latestBlog'));
    }

    public function detail($slug){
        $blog = Blog::whereJsonContains('slug->' . App::getLocale(), $slug)->first();
        if ($blog) {
            $heads = $this->headers($blog->getContent());
            $blogCategories = BlogCategory::where('status', 1)->get();
            $latestBlog = Blog::where('status', 1)->latest()->get();

            return view('frontend.blog.detail.index', compact('blog', 'heads', 'blogCategories', 'latestBlog'));
        } else {
            return to_route('blog.index')->with('response', [
                'status' => "warning",
                'message' => "Blog bulunamadı"
            ]);
        }
    }

    public function category($slug)
    {
        $category = BlogCategory::whereJsonContains('slug->' . App::getLocale(), $slug)->first();
        if (!$category) {
            return to_route('blog.index')->with('response', [
                'status' => "warning",
                'message' => trans('Kategori bulunamadı')
            ]);
        }
        $blogs = $category->blogs()->latest()->paginate(5);
        $categories = BlogCategory::where('status', 1)->has('blogs')->get();
        $latestBlog = Blog::where('status', 1)->latest()->take(10)->get();
        return view('frontend.blog.index', compact('blogs', 'categories', 'latestBlog', 'category'));
    }
    public function headers($html)
    {
        $heads = [];
        preg_match_all('/<h[1-5].*?>(.*?)<\/h[1-5]>/', $html, $matches);
        foreach ($matches[1] as $match) {
            $heads[] = $match;
        }
        return $heads;
    }
}
