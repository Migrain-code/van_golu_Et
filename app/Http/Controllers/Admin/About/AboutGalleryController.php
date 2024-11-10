<?php

namespace App\Http\Controllers\Admin\About;

use App\Http\Controllers\Controller;
use App\Models\AboutGallery;
use Illuminate\Http\Request;

class AboutGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galleries = AboutGallery::all();
        return view('admin.about-gallery.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
           'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'image.required' => 'Lütfen bir resim yükleyin',
            'image.image' => 'Lütfen bir resim dosyası yükleyin',
            'image.mimes' => 'Lütfen bir resim dosyası yükleyin',
            'image.max' => 'Lütfen bir resim dosyası yükleyin',
        ], [
            'image' => 'Görsel',
        ]);
        if ($request->hasFile('image')) {
            $aboutGallery = new AboutGallery();
            $aboutGallery->image = $request->file('image')->store('gallery');
            $aboutGallery->save();
        }
        return to_route('admin.about-gallery.index')->with('response', [
            'status' => "success",
            'message' => "Görsel Kayıt Edildi"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(AboutGallery $aboutGallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AboutGallery $aboutGallery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AboutGallery $aboutGallery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AboutGallery $aboutGallery)
    {
        //
    }
}
