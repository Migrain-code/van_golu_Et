<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class SearchProductController extends Controller
{
    public function category($slug)
    {
        $category = Category::whereJsonContains('slug->' . App::getLocale(), $slug)->first();
        if (!$category) {
            return to_route('blog.index')->with('response', [
                'status' => "warning",
                'message' => trans('Kategori bulunamadı')
            ]);
        }
        return view('frontend.product.category.index', compact('category'));
    }

    public function subCategory($slug, $subCategory)
    {
        $category = Category::whereJsonContains('slug->' . App::getLocale(), $slug)->first();
        if (!$category) {
            return to_route('blog.index')->with('response', [
                'status' => "warning",
                'message' => trans('Kategori bulunamadı')
            ]);
        }
        $subCategory = $category->subCategories()->whereJsonContains('slug->' . App::getLocale(), $subCategory)->first();
        return view('frontend.product.subcategory.index', compact('category', 'subCategory'));
    }
}
