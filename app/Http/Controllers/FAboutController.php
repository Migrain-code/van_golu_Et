<?php

namespace App\Http\Controllers;

use App\Models\AboutGallery;
use App\Models\DownloadableContent;
use App\Models\NewsPaper;
use App\Models\Reference;
use App\Models\Team;
use App\Models\Video;
use Illuminate\Http\Request;

class FAboutController extends Controller
{
    public function index()
    {
        $galleries = AboutGallery::all();
        $teams = Team::all();
        $references = Reference::where('status', 1)->take(4)->get();
        $downloadableContents = DownloadableContent::where('status', 1)->take(10)->get();
        return view('frontend.about.index', compact('galleries', 'references', 'downloadableContents', 'teams'));
    }

    public function team()
    {
        $teams = Team::where('status', 1)->get();
        return view('frontend.team.index', compact('teams'));
    }

    public function video()
    {
        $videos = Video::where('status', 1)->get();
        return view('frontend.video.index', compact('videos'));
    }

    public function newspaper()
    {
        $newspapers = Newspaper::where('status', 1)->get();
        return view('frontend.newspaper.index', compact('newspapers'));
    }
}
