<?php

namespace App\Http\Controllers;

use App\Models\Ads;
use App\Services\UploadFile;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class AdsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $typeList = Ads::TYPE_LIST;

        return view('ads.index', compact('typeList'));
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
        $ads = new Ads();
        $ads->title = $request->title;
        $ads->description = $request->description;
        $ads->link = $request->input('link');
        $ads->type = $request->input('type');
        if ($request->hasFile('image')) {
            $response = UploadFile::uploadFile($request->file('image'), 'advert_images');
            $ads->image = $response["image"]["way"];
        }
        if ($request->hasFile('logo')) {
            $response = UploadFile::uploadFile($request->file('logo'), 'advert_logos');
            $ads->logo = $response["image"]["way"];
        }
        if ($ads->save()){
            return response()->json([
                'status' => "success",
                'message' => "Reklam Başarılı Bir Şekilde Eklendi"
            ]);
        } else{
            return response()->json([
                'status' => "warning",
                'message' => "Reklam Bir Hata Sebebi İle Eklenemedi"
            ]);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Ads $ads)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ads $advert)
    {
        $typeList = Ads::TYPE_LIST;
        return view('ads.detail.edit', compact('advert', 'typeList'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ads $advert)
    {
        $advert->title = $request->title;
        $advert->description = $request->description;
        $advert->link = $request->input('link');
        $advert->type = $request->input('type');
        if ($request->hasFile('image')) {
            $response = UploadFile::uploadFile($request->file('image'), 'ads_images');
            $advert->image = $response["image"]["way"];
        }
        if ($request->hasFile('logo')) {
            $response = UploadFile::uploadFile($request->file('logo'), 'advert_logos');
            $advert->logo = $response["image"]["way"];
        }
        if ($advert->save()){
            return to_route('admin.advert.index')->with('response', [
                'status' => "success",
                'message' => "Reklam Başarılı Bir Şekilde Güncellendi"
            ]);
        } else{
            return back()->with('response', [
                'status' => "warning",
                'message' => "Reklam Bir Hata Sebebi İle Güncellenemedi"
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ads $advert)
    {
        //
    }

    public function datatable()
    {
        $ads = Ads::latest();

        return DataTables::of($ads)
            ->editColumn('id', function ($q) {
                return createCheckbox($q->id, 'Ads', 'Reklamları');
            })
            ->editColumn('title', function ($q) {
                return $q->getTitle();
            })
            ->editColumn('type', function ($q) {
                return $q->type()["name"];
            })
            ->editColumn('status', function ($q) {
                return create_switch($q->id, $q->status == 1 ? true : false, 'Ads', 'status');
            })
            ->editColumn('created_at', function ($q) {
                return $q->created_at->format('d.m.Y H:i:s');
            })
            ->addColumn('action', function ($q) {
                $html = "";
                $html .= create_edit_button(route('admin.advert.edit', $q->id));
                $html .= create_delete_button('Ads', $q->id, 'Reklam', 'Reklam Kaydını Silmek İstediğinize Eminmisiniz?');
                return $html;
            })
            ->rawColumns(['id', 'action'])
            ->make(true);
    }

}
