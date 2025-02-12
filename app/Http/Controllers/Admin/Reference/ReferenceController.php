<?php

namespace App\Http\Controllers\Admin\Reference;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Reference;
use App\Models\ReferenceCategory;
use App\Models\ReferenceImage;
use App\Models\ReferenceProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class ReferenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.reference.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.reference.create.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $reference = new Reference();
        $reference->name = $request->title;
        $reference->meta_title = $request->meta_title;
        $reference->meta_description = $request->meta_description;
        $reference->description = $request->short_description;
        $reference->content = $request->technic;
        $slugs = [];
        foreach ($request->title as $locale => $title) {
            $slugs[$locale] = Str::slug($title);
        }
        $reference->slug = $slugs;
        if ($request->hasFile('image')) {
            $reference->image = $request->file('image')->store('referenceImages');
        }

        if ($reference->save()) {
            return redirect()->route('admin.reference.index')->with('response', [
                'status' => 'success',
                'message' => 'Referans Başarıyla Eklendi'
            ]);
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reference $reference)
    {
        return view('admin.reference.edit.index', compact('reference'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reference $reference)
    {
        $reference->name = $request->title;
        $reference->meta_title = $request->meta_title;
        $reference->meta_description = $request->meta_description;
        $reference->description = $request->short_description;
        $reference->content = $request->technic;
        $slugs = [];
        foreach ($request->title as $locale => $title) {
            $slugs[$locale] = Str::slug($title);
        }
        $reference->slug = $slugs;
        if ($request->hasFile('image')) {
            $reference->image = $request->file('image')->store('referenceImages');
        }

        if ($reference->save()) {
            return redirect()->route('admin.reference.index')->with('response', [
                'status' => 'success',
                'message' => 'Referans Başarıyla Güncellendi'
            ]);
        }
    }


    public function datatable()
    {
        $data = Reference::latest();

        return DataTables::of($data)
            ->editColumn('id', function ($q) {
                return createCheckbox($q->id, 'Reference', 'Referansları');
            })
            ->editColumn('name', function ($q) {
                return $q->getName();
            })
            ->editColumn('status', function ($q) {
                return create_switch($q->id, $q->status == 1 ? true : false, 'Reference', 'status');
            })
            ->editColumn('meta_title', function ($q) {
                return $q->getMetaTitle();
            })
            ->editColumn('created_at', function ($q) {
                return $q->created_at->format('d.m.Y H:i:s');
            })
            ->addColumn('action', function ($q) {
                $html = "";
                $html .= create_edit_button(route('admin.reference.edit', $q->id));
                $html .= create_delete_button('Reference', $q->id, 'Referans', 'Referans Kaydını Silmek İstediğinize Eminmisiniz?');
                return $html;
            })
            ->rawColumns(['id', 'action'])
            ->make(true);
    }

}
