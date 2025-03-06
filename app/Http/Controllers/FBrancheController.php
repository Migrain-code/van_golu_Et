<?php

namespace App\Http\Controllers;

use App\Models\Branche;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class FBrancheController extends Controller
{
    public function index()
    {
        $branches = Branche::where('status', 1)->get();
        return view('frontend.branche.index', compact('branches'));
    }

    public function detail($slug)
    {
        $branche = Branche::whereJsonContains('slug->' . App::getLocale(), $slug)->first();

        return view('frontend.branche.detail.index', compact('branche'));
    }

}
