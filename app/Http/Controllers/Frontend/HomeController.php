<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\City;
use App\Models\Language;
use App\Models\MainPage;
use App\Models\Product;
use App\Models\Reference;
use App\Models\Series;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::where("isActive", 1)->get();
        $parts = MainPage::where('status', 1)->get();
        $references = Reference::where('status', 1)->take(3)->get();
        $blogs = Blog::where('status', 1)->where('is_main_page', 1)->take(4)->get();
        $categories = Category::where('status', 1)->take(5)->get();
        $products = Product::where('status', 1)->take(8)->get();
        return view('frontend.home.index', compact('products','sliders', 'parts', 'blogs', 'references', 'categories'));
    }

    public function product()
    {
        $products = Product::where('status', 1)->paginate(12);
        return view('frontend.product.category.index', compact('products'));
    }

    public function productDetail($slug)
    {
        $product = Product::whereJsonContains('slug->' . App::getLocale(), $slug)->first();
        return view('frontend.product.detail.index', compact('product'));
    }
    public function productCategory($slug)
    {
        $category = Series::whereJsonContains('slug->' . App::getLocale(), $slug)->first();
        $products = $category->products()->paginate(12);
        return view('frontend.product.category.index', compact('products', 'category'));
    }
    public function changeLanguage(Language $language)
    {
        $locale = $language->code;

        // Dil değişikliğini uygulamak için Laravel'in yerel dilini ayarla
        app()->setLocale($locale);
        // Kullanıcının seçimini oturuma kaydet
        session(['locale' => $locale]);

        return to_route('home');
    }

    public function city(Request $request)
    {
        $city = City::find($request->id);
        return response()->json($city->districts);
    }

    public function kvkk()
    {
        return view('frontend.kvkk.index');
    }
}
