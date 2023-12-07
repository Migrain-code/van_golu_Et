<?php

namespace App\Http\Controllers;

use App\Models\BusinessFaqCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class BusinessFaqCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('category.business-faq-category.index');
    }

    public function store(Request $request)
    {
        $businessFaqCategory = new BusinessFaqCategory();
        $businessFaqCategory->name = $request->name;
        $businessFaqCategory->order_number = BusinessFaqCategory::max('order_number') + 1;
        $businessFaqCategory->status = 0;
        $businessFaqCategory
            ->setTranslation('slug', 'de', Str::slug($request->name['de']))
            ->setTranslation('slug', 'en', Str::slug($request->name['en']))
            ->setTranslation('slug', 'es', Str::slug($request->name['es']))
            ->setTranslation('slug', 'fr', Str::slug($request->name['fr']))
            ->setTranslation('slug', 'it', Str::slug($request->name['it']))
            ->setTranslation('slug', 'tr', Str::slug($request->name['tr']));

        if ($businessFaqCategory->save()){
            return response()->json([
                'status' => "success",
                'message' => "SSS Kategorisi Eklendi"
            ]);
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BusinessFaqCategory $businessFaqCategory)
    {
        Session::put('category_id', $businessFaqCategory->id);
        return view('category.business-faq-category.detail.edit', compact('businessFaqCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BusinessFaqCategory $businessFaqCategory)
    {
        $businessFaqCategory->name = $request->name;
        $businessFaqCategory->order_number = BusinessFaqCategory::max('order_number') + 1;
        $businessFaqCategory->status = 0;
        $businessFaqCategory
            ->setTranslation('slug', 'de', Str::slug($request->name['de']))
            ->setTranslation('slug', 'en', Str::slug($request->name['en']))
            ->setTranslation('slug', 'es', Str::slug($request->name['es']))
            ->setTranslation('slug', 'fr', Str::slug($request->name['fr']))
            ->setTranslation('slug', 'it', Str::slug($request->name['it']))
            ->setTranslation('slug', 'tr', Str::slug($request->name['tr']));

        if ($businessFaqCategory->save()){
            return response()->json([
                'status' => "success",
                'message' => "SSS Kategorisi Eklendi"
            ]);
        }
    }

    public function datatable()
    {
        $businessFaqCategories = BusinessFaqCategory::orderBy('order_number', 'asc');

        return DataTables::of($businessFaqCategories)
            ->editColumn('id', function ($q) {
                return createCheckbox($q->id, 'BusinessFaqCategory', 'İşletme Kategorisini');
            })
            ->editColumn('name', function ($q) {
                return $q->getName();
            })
            ->editColumn('created_at', function ($q) {
                return $q->created_at->format('d.m.Y H:i:s');
            })
            ->editColumn('status', function ($q) {
                return create_switch($q->id, $q->status == 1 ? true : false, 'BusinessFaqCategory', 'status');
            })
            ->addColumn('action', function ($q) {
                $html = '<div class="d-flex justify-content-center align-items-center">';
                $html .= create_edit_button(route('admin.businessFaqCategory.edit', $q->id));
                $html .= create_delete_button('BusinessFaqCategory', $q->id, 'Kategori', 'Kategori Kaydını Silmek İstediğinize Eminmisiniz?');
                $html .= '</div>';

                return $html;
            })
            ->rawColumns(['id', 'action', 'created_at'])
            ->make(true);
    }

}
