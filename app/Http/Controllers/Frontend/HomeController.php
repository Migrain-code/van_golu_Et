<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\City;
use App\Models\Language;
use App\Models\MainPage;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::where("isActive", 1)->get();
        $parts = MainPage::where('status', 1)->get();
        $blogs = Blog::where('status', 1)->where('is_main_page', 1)->get();

        return view('frontend.home.index', compact('sliders', 'parts', 'blogs'));
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
