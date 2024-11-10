<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Reference;
use App\Models\ReferenceCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class FReferenceController extends Controller
{
    public function index()
    {
        $categories = ReferenceCategory::where('status', 1)->get();
        $references = Reference::where('status', 1)->paginate(9);
        return view('frontend.reference.index', compact('categories', 'references'));
    }

    public function category($category)
    {
        $categories = ReferenceCategory::where('status', 1)->get();
        $category = ReferenceCategory::whereJsonContains('slug->' . App::getLocale(), $category)->first();
        if (!$category) {
            return to_route('reference.index')->with('response', [
                'status' => "warning",
                'message' => trans('Kategori bulunamadı')
            ]);
        }
        $references = $category->references()->where('status', 1)->paginate(9);

        return view('frontend.reference.index', compact('category', 'categories', 'references'));
    }

    public function detail($category,$slug)
    {
        $categories = ReferenceCategory::where('status', 1)->get();
        $category = ReferenceCategory::whereJsonContains('slug->' . App::getLocale(), $category)->first();
        $reference = $category->references()->where('status', 1)->whereJsonContains('slug->' . App::getLocale(), $slug)->first();

        return view('frontend.reference.detail.index', compact('category', 'categories', 'reference'));
    }
}
