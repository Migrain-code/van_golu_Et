<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceCategory;
use App\Services\UploadFile;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class ServiceCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.category.service-category.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $serviceCategory = new ServiceCategory();
        $serviceCategory->name = $request->name;
        $serviceCategory->order_number = ServiceCategory::max('order_number') + 1;
        $serviceCategory
            ->setTranslation('slug', 'de', Str::slug($request->name['de']))
            ->setTranslation('slug', 'en', Str::slug($request->name['en']))
            ->setTranslation('slug', 'es', Str::slug($request->name['es']))
            ->setTranslation('slug', 'fr', Str::slug($request->name['fr']))
            ->setTranslation('slug', 'it', Str::slug($request->name['it']))
            ->setTranslation('slug', 'tr', Str::slug($request->name['tr']));

        if ($request->hasFile('category_icon')) {
            $response = UploadFile::uploadFile($request->file('category_icon'), 'serviceCategory_icons');
            $serviceCategory->image = $response["image"]["way"];
        }

        if ($request->hasFile('cover_image')) {
            $response = UploadFile::uploadFile($request->file('category_icon'), 'serviceCategory_cover_images');
            $serviceCategory->cover_image = $response["image"]["way"];
        }

        if ($serviceCategory->save()){
            return response()->json([
                'status' => "success",
                'message' => "Hizmet Kategorisi Eklendi"
            ]);
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ServiceCategory $serviceCategory)
    {
        return view('admin.category.service-category.detail.edit', compact('serviceCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ServiceCategory $serviceCategory)
    {
        $serviceCategory->name = $request->name;
        $serviceCategory->order_number = ServiceCategory::max('order_number') + 1;
        $serviceCategory
            ->setTranslation('slug', 'de', Str::slug($request->name['de']))
            ->setTranslation('slug', 'en', Str::slug($request->name['en']))
            ->setTranslation('slug', 'es', Str::slug($request->name['es']))
            ->setTranslation('slug', 'fr', Str::slug($request->name['fr']))
            ->setTranslation('slug', 'it', Str::slug($request->name['it']))
            ->setTranslation('slug', 'tr', Str::slug($request->name['tr']));

        if ($request->hasFile('category_icon')) {
            $response = UploadFile::uploadFile($request->file('category_icon'), 'serviceCategory_icons');
            $serviceCategory->image = $response["image"]["way"];
        }

        if ($request->hasFile('cover_image')) {
            $response = UploadFile::uploadFile($request->file('category_icon'), 'serviceCategory_cover_images');
            $serviceCategory->cover_image = $response["image"]["way"];
        }

        if ($serviceCategory->save()){
            return to_route('admin.serviceCategory.index')->with('response',[
                'status' => "success",
                'message' => "Hizmet Kategorisi Eklendi"
            ]);
        }
    }

    public function datatable()
    {
        $serviceCategory = ServiceCategory::orderBy('order_number', 'asc')->get();

        return DataTables::of($serviceCategory)
            ->editColumn('id', function ($q) {
                return createCheckbox($q->id, 'ServiceCategory', 'Hizmet Kategorisini');
            })
            ->editColumn('name', function ($q) {
                return $q->getName();
            })
            ->editColumn('image', function ($q) {
                return html()->img(image($q->image))->class('w-50px h-50px rounded object-fit-cover');
            })
            ->editColumn('created_at', function ($q) {
                return $q->created_at->format('d.m.Y H:i:s');
            })
            ->addColumn('action', function ($q) {
                $html = '<div class="d-flex justify-content-center align-items-center">';
                $html .= create_edit_button(route('admin.serviceCategory.edit', $q->id));
                $html .= create_delete_button('ServiceCategory', $q->id, 'Kategori', 'Kategori Kaydını Silmek İstediğinize Eminmisiniz?');
                $html .= '</div>';

                return $html;
            })
            ->rawColumns(['id', 'action', 'created_at'])
            ->make(true);
    }
}
