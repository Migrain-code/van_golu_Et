<?php

namespace App\Http\Controllers\Admin\Reference;

use App\Http\Controllers\Controller;
use App\Models\ReferenceCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class ReferenceCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.category.reference.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.reference.create.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $referenceCategory = new ReferenceCategory();
        $referenceCategory->name = $request->title;
        $referenceCategory->meta_title = $request->meta_title;
        $referenceCategory->meta_description = $request->meta_description;

        $slugs = [];
        foreach ($request->title as $locale => $title) {
            $slugs[$locale] = Str::slug($title);
        }
        $referenceCategory->slug = $slugs;
        if ($request->hasFile('image')) {
            $referenceCategory->image = $request->file('image')->store('referenceCategoryImages');
        }
        if ($referenceCategory->save()) {
            return redirect()->route('admin.reference-category.index')->with('response', [
                'status' => 'success',
                'message' => 'Kategori Başarılı Bir Şekilde Oluşturuldu'
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ReferenceCategory $referenceCategory)
    {
        return view('admin.category.reference.edit.index', compact('referenceCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ReferenceCategory $referenceCategory)
    {
        $referenceCategory->name = $request->title;
        $referenceCategory->meta_title = $request->meta_title;
        $referenceCategory->meta_description = $request->meta_description;

        $slugs = [];
        foreach ($request->title as $locale => $title) {
            $slugs[$locale] = Str::slug($title);
        }
        $referenceCategory->slug = $slugs;
        if ($request->hasFile('image')) {
            $referenceCategory->image = $request->file('image')->store('referenceCategoryImages');
        }
        if ($referenceCategory->save()) {
            return redirect()->route('admin.reference-category.index')->with('response', [
                'status' => 'success',
                'message' => 'Kategori Başarılı Bir Şekilde Güncellendi'
            ]);
        }
    }
    public function datatable()
    {
        $data = ReferenceCategory::latest();

        return DataTables::of($data)
            ->editColumn('id', function ($q) {
                return createCheckbox($q->id, 'ReferenceCategory', 'Kategorileri');
            })
            ->editColumn('name', function ($q) {
                return $q->getName();
            })
            ->editColumn('meta_title', function ($q) {
                return $q->getMetaTitle();
            })
            ->editColumn('status', function ($q) {
                return create_switch($q->id, $q->status == 1 ? true : false, 'ReferenceCategory', 'status');
            })
            ->editColumn('created_at', function ($q) {
                return $q->created_at->format('d.m.Y H:i:s');
            })
            ->addColumn('action', function ($q) {
                $html = "";
                $html .= create_edit_button(route('admin.reference-category.edit', $q->id));
                $html .= create_delete_button('ReferenceCategory', $q->id, 'Kategori', 'Kategori Kaydını Silmek İstediğinize Eminmisiniz?');
                return $html;
            })
            ->rawColumns(['id', 'action'])
            ->make(true);
    }


}
