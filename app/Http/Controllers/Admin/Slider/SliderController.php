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
        //$request->dd();
        $slider = new Slider();
        $slider->title = $request->title;
        $slider->btn_text = $request->btn_text;
        $slider->btn_link = $request->btn_link;
        $slider->description = $request->descriptions;
        if ($request->hasFile('image')) {
            $slider->image = $request->file('image')->store('slider');
        }
        if ($slider->save()){
            return redirect()->route('admin.slider.index')->with('response', [
                'status' => "success",
                'message' => 'Slider Added Successfully'
            ]);
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slider $slider)
    {
        return view('admin.slider.edit.index', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Slider $slider)
    {
        $slider->title = $request->title;
        $slider->btn_text = $request->btn_text;
        $slider->btn_link = $request->btn_link;
        $slider->description = $request->descriptions;
        if ($request->hasFile('image')) {
            $slider->image = $request->file('image')->store('slider');
        }
        if ($slider->save()){
            return redirect()->route('admin.slider.index')->with('response', [
                'status' => "success",
                'message' => 'Slider Updated Successfully'
            ]);
        }
    }

    public function datatable()
    {
        $sliders = Slider::latest();

        return DataTables::of($sliders)
            ->editColumn('id', function ($q) {
                return createCheckbox($q->id, 'Slider', 'Sliderları');
            })
            ->editColumn('title', function ($q) {
                return $q->getTitle();
            })
            ->editColumn('btn_text', function ($q) {
                return $q->getButtonText();
            })
            ->editColumn('isActive', function ($q) {
                return create_switch($q->id, $q->isActive == 1 ? true : false, 'Slider', 'isActive');
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
