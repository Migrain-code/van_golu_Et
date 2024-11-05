<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Language;

class HomeController extends Controller
{
    public function index()
    {
        return view('frontend.home.index');
    }

    public function changeLanguage(Language $language)
    {
        $locale = $language->code;

        // Dil değişikliğini uygulamak için Laravel'in yerel dilini ayarla
        app()->setLocale($locale);

        // Kullanıcının seçimini oturuma kaydet
        session(['locale' => $locale]);

        return redirect()->back()->with('response', [
            'status' => "success",
            'message' => trans('Dil Başarılı Bir Şekilde Değiştirildi.'),
        ]);
    }
}
