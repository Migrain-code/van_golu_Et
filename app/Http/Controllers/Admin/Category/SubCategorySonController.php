<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubCategorySon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class SubCategorySonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.category.subcategoryson.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::where('status', 1)->get();
        return view('admin.category.subcategoryson.create.index', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $subCategorySon = new SubCategorySon();
        $subCategorySon->name = $request->title;
        $subCategorySon->meta_title = $request->meta_title;
        $subCategorySon->meta_description = $request->meta_description;
        $subCategorySon->category_id = $request->category_id;
        $slugs = [];
        foreach ($request->title as $locale => $title) {
            $slugs[$locale] = Str::slug($title);
        }
        $subCategorySon->slug = $slugs;
        if ($request->hasFile('image')) {
            $subCategorySon->image = $request->file('image')->store('subCategorySonImages');
        }
        if ($subCategorySon->save()) {
            return redirect()->route('admin.subCategorySon.index')->with('response', [
                'status' => 'success',
                'message' => 'Kategori Başarılı Bir Şekilde Oluşturuldu'
            ]);
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubCategorySon $subCategorySon)
    {
        $categories = Category::where('status', 1)->get();
        return view('admin.category.subcategoryson.edit.index', compact('categories', 'subCategorySon'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SubCategorySon $subCategorySon)
    {
        $subCategorySon->name = $request->title;
        $subCategorySon->meta_title = $request->meta_title;
        $subCategorySon->meta_description = $request->meta_description;
        $subCategorySon->category_id = $request->category_id;
        $slugs = [];
        foreach ($request->title as $locale => $title) {
            $slugs[$locale] = Str::slug($title);
        }
        $subCategorySon->slug = $slugs;
        if ($request->hasFile('image')) {
            $subCategorySon->image = $request->file('image')->store('subCategorySonImages');
        }
        if ($subCategorySon->save()) {
            return redirect()->route('admin.subCategorySon.index')->with('response', [
                'status' => 'success',
                'message' => 'Kategori Başarılı Bir Şekilde Güncellendi'
            ]);
        }
    }

    public function datatable()
    {
        $data = SubCategorySon::latest();

        return DataTables::of($data)
            ->editColumn('id', function ($q) {
                return createCheckbox($q->id, 'SubCategorySon', 'Kategorileri');
            })
            ->editColumn('name', function ($q) {
                return $q->getName();
            })
            ->editColumn('meta_title', function ($q) {
                return $q->getMetaTitle();
            })
            ->editColumn('status', function ($q) {
                return create_switch($q->id, $q->status == 1 ? true : false, 'SubCategorySon', 'status');
            })
            ->editColumn('created_at', function ($q) {
                return $q->created_at->format('d.m.Y H:i:s');
            })
            ->addColumn('action', function ($q) {
                $html = "";
                $html .= create_edit_button(route('admin.subCategorySon.edit', $q->id));
                $html .= create_delete_button('SubCategorySon', $q->id, 'Kategori', 'Kategori Kaydını Silmek İstediğinize Eminmisiniz?');
                return $html;
            })
            ->rawColumns(['id', 'action'])
            ->make(true);
    }

}
