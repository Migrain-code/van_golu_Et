<?php

namespace App\Http\Controllers;

use App\Models\AboutGallery;
use App\Models\DownloadableContent;
use App\Models\Reference;
use Illuminate\Http\Request;

class FAboutController extends Controller
{
    public function index()
    {
        $galleries = AboutGallery::all();
        $references = Reference::where('status', 1)->take(4)->get();
        $downloadableContents = DownloadableContent::where('status', 1)->take(6)->get();
        return view('frontend.about.index', compact('galleries', 'references', 'downloadableContents'));
    }
}
