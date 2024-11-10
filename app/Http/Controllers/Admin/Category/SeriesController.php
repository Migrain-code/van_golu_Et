<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Series;
use App\Models\SubCategory;
use App\Models\SubCategorySon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class SeriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.category.series.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = SubCategory::where('status', 1)->get();
        return view('admin.category.series.create.index', compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $series = new Series();
        $series->name = $request->title;
        $series->description = $request->short_description;
        $series->meta_title = $request->meta_title;
        $series->meta_description = $request->meta_description;
        $series->category_id = $request->category_id;
        $slugs = [];
        foreach ($request->title as $locale => $title) {
            $slugs[$locale] = Str::slug($title);
        }
        $series->slug = $slugs;
        if ($request->hasFile('image')) {
            $series->image = $request->file('image')->store('seriesImages');
        }
        if ($series->save()) {
            return redirect()->route('admin.series.index')->with('response', [
                'status' => 'success',
                'message' => 'Grup Başarılı Bir Şekilde Oluşturuldu'
            ]);
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Series $series)
    {
        $categories = SubCategory::where('status', 1)->get();
        return view('admin.category.series.edit.index', compact('series', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Series $series)
    {
        $series->name = $request->title;
        $series->description = $request->short_description;
        $series->meta_title = $request->meta_title;
        $series->meta_description = $request->meta_description;
        $series->category_id = $request->category_id;
        $slugs = [];
        foreach ($request->title as $locale => $title) {
            $slugs[$locale] = Str::slug($title);
        }
        $series->slug = $slugs;
        if ($request->hasFile('image')) {
            $series->image = $request->file('image')->store('seriesImages');
        }
        if ($series->save()) {
            return redirect()->route('admin.series.index')->with('response', [
                'status' => 'success',
                'message' => 'Grup Başarılı Bir Şekilde Güncellendi'
            ]);
        }
    }

    public function datatable()
    {
        $data = Series::latest();

        return DataTables::of($data)
            ->editColumn('id', function ($q) {
                return createCheckbox($q->id, 'Series', 'Ürün Grupları');
            })
            ->editColumn('name', function ($q) {
                return $q->getName();
            })
            ->editColumn('meta_title', function ($q) {
                return $q->getMetaTitle();
            })
            ->editColumn('status', function ($q) {
                return create_switch($q->id, $q->status == 1 ? true : false, 'Series', 'status');
            })
            ->editColumn('created_at', function ($q) {
                return $q->created_at->format('d.m.Y H:i:s');
            })
            ->addColumn('action', function ($q) {
                $html = "";
                $html .= create_edit_button(route('admin.series.edit', $q->id));
                $html .= create_delete_button('Series', $q->id, 'Grup Kategori', 'Grup Kategori Kaydını Silmek İstediğinize Eminmisiniz?');
                return $html;
            })
            ->rawColumns(['id', 'action'])
            ->make(true);
    }

}
