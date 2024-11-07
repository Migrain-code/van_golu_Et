<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class FContactController extends Controller
{
    public function index()
    {
        return view('frontend.contact.index');
    }
}
