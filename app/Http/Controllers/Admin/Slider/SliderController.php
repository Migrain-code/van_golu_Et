<?php

namespace App\Http\Controllers\Admin\Slider;

use App\Http\Controllers\Controller;
use App\Models\Ads;
use App\Models\Slider;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.slider.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.slider.create.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


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

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ads $advert)
    {

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
        $ads = Slider::latest();

        return DataTables::of($ads)
            ->editColumn('id', function ($q) {
                return createCheckbox($q->id, 'Slider', 'Sliderları');
            })
            ->editColumn('title', function ($q) {
                return $q->getTitle();
            })
            ->editColumn('btn_text', function ($q) {
                return $q->btn_text;
            })
            ->editColumn('status', function ($q) {
                return create_switch($q->id, $q->status == 1 ? true : false, 'Ads', 'status');
            })
            ->editColumn('created_at', function ($q) {
                return $q->created_at->format('d.m.Y H:i:s');
            })
            ->addColumn('action', function ($q) {
                $html = "";
                $html .= create_edit_button(route('admin.slider.edit', $q->id));
                $html .= create_delete_button('Slider', $q->id, 'Slider', 'Slider Kaydını Silmek İstediğinize Eminmisiniz?');
                return $html;
            })
            ->rawColumns(['id', 'action'])
            ->make(true);
    }

}
