<?php

namespace App\Http\Controllers;

use App\Models\Production;
use App\Models\ProductionCategory;
use App\Models\Reference;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class FProductionController extends Controller
{
    public function index()
    {
        $categories = ProductionCategory::where('status', 1)->get();
        $productions = Production::where('status', 1)->paginate(9);
        return view('frontend.production.index', compact('categories', 'productions'));
    }

    public function category($category)
    {
        $categories = ProductionCategory::where('status', 1)->get();
        $category = ProductionCategory::whereJsonContains('slug->' . App::getLocale(), $category)->first();
        if (!$category) {
            return to_route('reference.index')->with('response', [
                'status' => "warning",
                'message' => trans('Kategori bulunamadı')
            ]);
        }
        $productions = $category->productions()->where('status', 1)->paginate(9);

        return view('frontend.production.index', compact('category', 'categories', 'productions'));
    }
}
