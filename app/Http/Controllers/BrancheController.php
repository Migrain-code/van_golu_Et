<?php

namespace App\Http\Controllers;

use App\Models\Branche;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class BrancheController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.branche.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.branche.create.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $branche = new Branche();
        $branche->name = $request->title;
        $branche->email = $request->email;
        $branche->phone = $request->phone;
        $branche->address = $request->short_description;
        $branche->embed = $request->embed_code;
        $slugs = [];
        foreach ($request->title as $locale => $title) {
            $slugs[$locale] = Str::slug($title);
        }
        $branche->slug = $slugs;
        if ($request->hasFile('image')){
            $branche->image = $request->file('image')->store('brancheImages');
        }
        if ($branche->save()) {
            return to_route('admin.branche.index')->with('response', [
                'status' => 'success',
                'message' => 'Şube Başarıyla Eklendi',
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Branche $branche)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Branche $branche)
    {
        return view('admin.branche.edit.index', compact('branche'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Branche $branche)
    {
        $branche->name = $request->title;
        $branche->email = $request->email;
        $branche->phone = $request->phone;
        $branche->address = $request->short_description;
        $branche->embed = $request->embed_code;
        $slugs = [];
        foreach ($request->title as $locale => $title) {
            $slugs[$locale] = Str::slug($title);
        }
        $branche->slug = $slugs;
        if ($request->hasFile('image')){
            $branche->image = $request->file('image')->store('brancheImages');
        }
        if ($branche->save()) {
            return to_route('admin.branche.index')->with('response', [
                'status' => 'success',
                'message' => 'Şube Başarıyla Eklendi',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Branche $branche)
    {
        //
    }

    public function datatable()
    {
        $data = Branche::latest();

        return DataTables::of($data)
            ->editColumn('id', function ($q) {
                return createCheckbox($q->id, 'Branche', 'Referansları');
            })
            ->editColumn('name', function ($q) {
                return $q->getName();
            })
            ->editColumn('status', function ($q) {
                return create_switch($q->id, $q->status == 1 ? true : false, 'Branche', 'status');
            })
            ->editColumn('phone', function ($q) {
                return $q->phone;
            })
            ->editColumn('created_at', function ($q) {
                return $q->created_at->format('d.m.Y H:i:s');
            })
            ->addColumn('action', function ($q) {
                $html = "";
                $html .= create_edit_button(route('admin.branche.edit', $q->id));
                $html .= create_delete_button('Branche', $q->id, 'Şube', 'Şube Kaydını Silmek İstediğinize Eminmisiniz?');
                return $html;
            })
            ->rawColumns(['id', 'action'])
            ->make(true);
    }

}
