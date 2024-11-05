<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MainCategory;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = MainCategory::all();
        return view('admin.category.sub-category.index', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $subCategory = new SubCategory();

        $this->extracted($request, $subCategory);
        return response()->json([
            'status' => "success",
            'message' => "Kategori Eklendi"
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubCategory $subCategory)
    {
        $categories = MainCategory::all();
        return view('admin.category.sub-category.detail.edit', compact('subCategory', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SubCategory $subCategory)
    {
        $this->extracted($request, $subCategory);
        return to_route('admin.subCategory.index')->with('response',[
            'status' => "success",
            'message' => "Kategori Güncellendi"
        ]);
    }

    public function extracted($request, $mainCategory)
    {
        $mainCategory->name = $request->input('name');
        $mainCategory->category_id = $request->input('category_id');
        $mainCategory->slug = Str::slug($request->input('name'));
        $mainCategory->meta_title= $request->input('meta_title');
        $mainCategory->meta_description = $request->input('meta_description');
        $mainCategory->save();
        return $mainCategory;
    }

    public function datatable()
    {
        $productCategories = SubCategory::latest();

        return DataTables::of($productCategories)
            ->editColumn('id', function ($q) {
                return createCheckbox($q->id, 'SubCategory', 'Üst Kategorileri');
            })
            ->editColumn('name', function ($q) {
                return $q->name;
            })
            ->addColumn('mainCategory', function ($q) {
                return $q->topCategory->name;
            })
            ->editColumn('created_at', function ($q) {
                return $q->created_at->format('d.m.Y H:i:s');
            })
            ->editColumn('status', function ($q) {
                return create_switch($q->id, $q->status == 1 ? true : false, 'SubCategory', 'status');
            })
            ->addColumn('action', function ($q) {
                $html = '<div class="d-flex justify-content-center align-items-center">';
                $html .= create_edit_button(route('admin.subCategory.edit', $q->id));
                $html .= create_delete_button('SubCategory', $q->id, 'Kategori', 'Kategori Kaydını Silmek İstediğinize Eminmisiniz?');
                $html .= '</div>';

                return $html;
            })
            ->rawColumns(['id', 'action', 'created_at'])
            ->make(true);
    }
}
