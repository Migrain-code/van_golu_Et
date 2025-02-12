<?php

namespace App\Http\Controllers\Admin\MainPage;

use App\Http\Controllers\Controller;
use App\Models\MainPage;
use App\Models\Slider;
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
        return view('admin.main-page.create.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $mainPage = new MainPage();
        $mainPage->title = $request->title;
        $mainPage->sub_title = $request->sub_title;
        $mainPage->description = $request->descriptions;
        foreach (range(1, 3) as $item) {
            $mainPage->{'box_' . $item . '_title'} = $request->{'box_' . $item . '_title'};
        }
        foreach (range(1, 3) as $item) {
            $mainPage->{'box_' . $item . '_counter'} = $request->{'box_' . $item . '_counter'};
        }
        $mainPage->image_rotation = $request->image_rotation ?? 0;
        if ($request->hasFile('image')) {
            $mainPage->image = $request->file('image')->store('mainPageImages');
        }
        if ($mainPage->save()) {
            return to_route('admin.main-page.index',)->with('response',[
                'status' => "success",
                'message' => "Alan Başarılı Bir Şekilde Eklendi"
            ]);
        } else {
            return to_route('admin.main-page.index',)->with('response',[
                'status' => "warning",
                'message' => "Alan Bir Hata Sebebi İle Eklenemedi"
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MainPage $mainPage)
    {
        return view('admin.main-page.edit.index', compact('mainPage'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MainPage $mainPage)
    {
        $mainPage->title = $request->title;
        $mainPage->sub_title = $request->sub_title;
        $mainPage->description = $request->descriptions;
        foreach (range(1, 3) as $item) {
            $mainPage->{'box_' . $item . '_title'} = $request->{'box_' . $item . '_title'};
        }
        foreach (range(1, 3) as $item) {
            $mainPage->{'box_' . $item . '_counter'} = $request->{'box_' . $item . '_counter'};
        }
        $mainPage->image_rotation = $request->image_rotation ?? 0;
        if ($request->hasFile('image')) {
            $mainPage->image = $request->file('image')->store('mainPageImages');
        }
        if ($mainPage->save()) {
            return to_route('admin.main-page.index',)->with('response',[
                'status' => "success",
                'message' => "Alan Başarılı Bir Şekilde Eklendi"
            ]);
        } else {
            return to_route('admin.main-page.index',)->with('response',[
                'status' => "warning",
                'message' => "Alan Bir Hata Sebebi İle Eklenemedi"
            ]);
        }
    }

    public function datatable()
    {
        $parts = MainPage::latest();

        return DataTables::of($parts)
            ->editColumn('id', function ($q) {
                return createCheckbox($q->id, 'MainPage', 'Bölümleri');
            })
            ->editColumn('title', function ($q) {
                return $q->getTitle();
            })
            ->editColumn('image', function ($q) {
                return html()->img(image($q->image))->style('width:35px;height:35px;border-radius:50%;object-fit:cover;object-position:center;');
            })
            ->editColumn('status', function ($q) {
                return create_switch($q->id, $q->status == 1 ? true : false, 'MainPage', 'status');
            })
            ->editColumn('created_at', function ($q) {
                return $q->created_at->format('d.m.Y H:i:s');
            })
            ->addColumn('action', function ($q) {
                $html = "";
                $html .= create_edit_button(route('admin.main-page.edit', $q->id));
                $html .= create_delete_button('MainPage', $q->id, 'Bölüm', 'Bölüm Kaydını Silmek İstediğinize Eminmisiniz?');
                return $html;
            })
            ->rawColumns(['id', 'action'])
            ->make(true);
    }

}
