<?php

namespace App\Http\Controllers\Admin\Production;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Production;
use App\Models\ProductionCategory;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ProductionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.production.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = ProductionCategory::all();
        return view('admin.production.create.index', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $production = new Production();
        $production->name = $request->title;
        $production->category_id = $request->category_id;
        if ($request->hasFile('image')) {
            $production->image = $request->file('image')->store('production');
        }
        if ($production->save()) {
            return to_route('admin.production.index')->with('response', [
                'status'=>"success",
                'message' => "Üretim Aşaması Eklendi"
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Production $production)
    {
        $categories = ProductionCategory::all();
        return view('admin.production.edit.index', compact('categories', 'production'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Production $production)
    {
        $production->name = $request->title;
        $production->category_id = $request->category_id;
        if ($request->hasFile('image')) {
            $production->image = $request->file('image')->store('production');
        }
        if ($production->save()) {
            return to_route('admin.production.index')->with('response', [
                'status'=>"success",
                'message' => "Üretim Aşaması Eklendi"
            ]);
        }
    }

    public function datatable()
    {
        $sliders = Production::latest();

        return DataTables::of($sliders)
            ->editColumn('id', function ($q) {
                return createCheckbox($q->id, 'Production', 'Üretim Aşamalarını');
            })
            ->editColumn('name', function ($q) {
                return $q->getName();
            })
            ->editColumn('category_id', function ($q) {
                return $q->category->getName();
            })
            ->editColumn('status', function ($q) {
                return create_switch($q->id, $q->status == 1 ? true : false, 'Production', 'status');
            })
            ->editColumn('created_at', function ($q) {
                return $q->created_at->format('d.m.Y H:i:s');
            })
            ->addColumn('action', function ($q) {
                $html = "";
                $html .= create_edit_button(route('admin.production.edit', $q->id));
                $html .= create_delete_button('Production', $q->id, 'Üretim', 'Üretim Kaydını Silmek İstediğinize Eminmisiniz?');
                return $html;
            })
            ->rawColumns(['id', 'action'])
            ->make(true);
    }

}
