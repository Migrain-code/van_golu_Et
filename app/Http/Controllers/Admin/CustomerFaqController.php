<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CustomerFaqCategory;
use App\Services\UploadFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class CustomerFaqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.category.customer-faq-category.index');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $customerFaqCategory = new CustomerFaqCategory();
        $customerFaqCategory->name = $request->name;
        $customerFaqCategory->order_number = CustomerFaqCategory::max('order_number') + 1;
        $customerFaqCategory->status = 0;
        $customerFaqCategory
            ->setTranslation('slug', 'de', Str::slug($request->name['de']))
            ->setTranslation('slug', 'en', Str::slug($request->name['en']))
            ->setTranslation('slug', 'es', Str::slug($request->name['es']))
            ->setTranslation('slug', 'fr', Str::slug($request->name['fr']))
            ->setTranslation('slug', 'it', Str::slug($request->name['it']))
            ->setTranslation('slug', 'tr', Str::slug($request->name['tr']));

        if ($customerFaqCategory->save()){
            return response()->json([
                'status' => "success",
                'message' => "SSS Kategorisi Eklendi"
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CustomerFaqCategory $customerFaqCategory)
    {
        Session::put('category_id', $customerFaqCategory->id);
        return view('admin.category.customer-faq-category.detail.edit', compact('customerFaqCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CustomerFaqCategory $customerFaqCategory)
    {
        $customerFaqCategory->name = $request->name;
        $customerFaqCategory->status = 0;
        $customerFaqCategory
            ->setTranslation('slug', 'de', Str::slug($request->name['de']))
            ->setTranslation('slug', 'en', Str::slug($request->name['en']))
            ->setTranslation('slug', 'es', Str::slug($request->name['es']))
            ->setTranslation('slug', 'fr', Str::slug($request->name['fr']))
            ->setTranslation('slug', 'it', Str::slug($request->name['it']))
            ->setTranslation('slug', 'tr', Str::slug($request->name['tr']));

        if ($customerFaqCategory->save()){
            return response()->json([
                'status' => "success",
                'message' => "SSS Kategorisi Eklendi"
            ]);
        }
    }

    public function datatable()
    {
        $customerFaqCategories = CustomerFaqCategory::orderBy('order_number', 'asc');

        return DataTables::of($customerFaqCategories)
            ->editColumn('id', function ($q) {
                return createCheckbox($q->id, 'CustomerFaqCategory', 'İşletme Kategorisini');
            })
            ->editColumn('name', function ($q) {
                return $q->getName();
            })
            ->editColumn('created_at', function ($q) {
                return $q->created_at->format('d.m.Y H:i:s');
            })
            ->editColumn('status', function ($q) {
                return create_switch($q->id, $q->status == 1 ? true : false, 'CustomerFaqCategory', 'status');
            })
            ->addColumn('action', function ($q) {
                $html = '<div class="d-flex justify-content-center align-items-center">';
                $html .= create_edit_button(route('admin.customerFaqCategory.edit', $q->id));
                $html .= create_delete_button('CustomerFaqCategory', $q->id, 'Kategori', 'Kategori Kaydını Silmek İstediğinize Eminmisiniz?');
                $html .= '</div>';

                return $html;
            })
            ->rawColumns(['id', 'action', 'created_at'])
            ->make(true);
    }
}
