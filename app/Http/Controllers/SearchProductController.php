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
        $subCategorySon = $subCategory->subCategories()->first();
        if (!$subCategorySon) {
            return to_route('search.category', [$category->getSlug()])->with('response', [
               'status' => "warning",
               'message' => trans("Bu Kategoride Ürün Bulunamadı")
            ]);
        }
        return to_route('search.subCategorySon', [$category->getSlug(), $subCategory->getSlug(), $subCategorySon->getSlug()]);
    }

    public function subCategorySon($slug, $subCategory, $subCategorySon)
    {
        $category = Category::whereJsonContains('slug->' . App::getLocale(), $slug)->first();
        if (!$category) {
            return to_route('home')->with('response', [
                'status' => "warning",
                'message' => trans('Kategori bulunamadı')
            ]);
        }
        $subCategory = $category->subCategories()->whereJsonContains('slug->' . App::getLocale(), $subCategory)->first();
        if (!$subCategory) {
            return to_route('home')->with('response', [
                'status' => "warning",
                'message' => trans('Kategori bulunamadı')
            ]);
        }
        $subCategorySon = $subCategory->subCategories()->whereJsonContains('slug->' . App::getLocale(), $subCategorySon)->first();

        return view('frontend.product.subcategory.index', compact('category', 'subCategory', 'subCategorySon'));

    }

    public function subCategoryProduct($slug, $subCategory, $subCategorySon, $product)
    {
        $category = Category::whereJsonContains('slug->' . App::getLocale(), $slug)->first();
        if (!$category) {
            return to_route('home')->with('response', [
                'status' => "warning",
                'message' => trans('Kategori bulunamadı')
            ]);
        }
        $subCategory = $category->subCategories()->whereJsonContains('slug->' . App::getLocale(), $subCategory)->first();
        if (!$subCategory) {
            return to_route('home')->with('response', [
                'status' => "warning",
                'message' => trans('Kategori bulunamadı')
            ]);
        }
        $subCategorySon = $subCategory->subCategories()->whereJsonContains('slug->' . App::getLocale(), $subCategorySon)->first();

        $series = $subCategorySon->series()
            ->whereHas('products', function ($q) use ($product) {
                $q->whereJsonContains('slug->' . App::getLocale(), $product);
            })
            ->first();
        $product = $series->products()
            ->whereJsonContains('slug->' . App::getLocale(), $product)
            ->first();

        return view('frontend.product.detail.index', compact('category', 'subCategory', 'subCategorySon', 'product', 'series'));

    }
}
