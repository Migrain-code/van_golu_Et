<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MaingPage;
use App\Services\UploadFile;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class MainPageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.main-page.index');
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
        $mainPage = new MaingPage();
        $mainPage->name = $request->title;
        $mainPage->value = $request->description;
        $mainPage->button_text = $request->button_text;
        $mainPage->link = $request->input('link');
        $mainPage->type = $request->input('type');

        if ($request->hasFile('image')) {
            $response = UploadFile::uploadFile($request->file('image'), 'main_page_images');
            $mainPage->image = $response["image"]["way"];
        }
        if ($mainPage->save()) {
            return response()->json([
                'status' => "success",
                'message' => "Alan Başarılı Bir Şekilde Eklendi"
            ]);
        } else {
            return response()->json([
                'status' => "warning",
                'message' => "Alan Bir Hata Sebebi İle Eklenemedi"
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MaingPage $mainPage)
    {
        return view('admin.main-page.detail.edit', compact('mainPage'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MaingPage $mainPage)
    {

        $mainPage->name = $request->title;
        $mainPage->value = $request->description;
        $mainPage->link = $request->input('link');
        $mainPage->type = $request->input('type');
        $mainPage->button_text = $request->input('button_text');

        if ($request->hasFile('image')) {
            $response = UploadFile::uploadFile($request->file('image'), 'main_page_images');
            $mainPage->image = $response["image"]["way"];
        }
        if ($mainPage->save()) {
            return to_route('admin.mainPage.index')->with('response',[
                'status' => "success",
                'message' => "Alan Başarılı Bir Şekilde Güncellendi"
            ]);
        } else {
            return to_route('admin.mainPage.index')->with('response',[
                'status' => "warning",
                'message' => "Alan Bir Hata Sebebi İle Güncellenemedi"
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function datatable()
    {
        $pages = MaingPage::latest();

        return DataTables::of($pages)
            ->editColumn('id', function ($q) {
                return createCheckbox($q->id, 'MaingPage', 'Alanı');
            })
            ->editColumn('status', function ($q) {
                return create_switch($q->id, $q->status == 1 ? true : false, 'MaingPage', 'status');
            })
            ->editColumn('name', function ($q) {
                return $q->getName();
            })
            ->editColumn('type', function ($q) {
                return $q->type == 0 ? "Müşteri" : "İşletme";
            })
            ->editColumn('created_at', function ($q) {
                return $q->created_at->format('d.m.Y H:i:s');
            })
            ->addColumn('action', function ($q) {
                $html = "";
                $html .= create_edit_button(route('admin.mainPage.edit', $q->id));
                $html .= create_delete_button('MaingPage', $q->id, 'Bölümü', 'Bölüm Kaydını Silmek İstediğinize Eminmisiniz?');
                return $html;
            })
            ->rawColumns(['id', 'action'])
            ->make(true);
    }

}
