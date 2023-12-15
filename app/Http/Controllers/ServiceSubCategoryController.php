<?php

namespace App\Http\Controllers;

use App\Models\ServiceCategory;
use App\Models\ServiceSubCategory;
use App\Services\UploadFile;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class ServiceSubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $serviceCategories = ServiceCategory::all();
        return view('service.index', compact('serviceCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $serviceSubCategory = new ServiceSubCategory();
        $serviceSubCategory->category_id = $request->category_id;
        $serviceSubCategory->name = $request->name;
        $serviceSubCategory->order_number = ServiceSubCategory::max('order_number') + 1;
        $serviceSubCategory
            ->setTranslation('slug', 'de', Str::slug($request->name['de']))
            ->setTranslation('slug', 'en', Str::slug($request->name['en']))
            ->setTranslation('slug', 'es', Str::slug($request->name['es']))
            ->setTranslation('slug', 'fr', Str::slug($request->name['fr']))
            ->setTranslation('slug', 'it', Str::slug($request->name['it']))
            ->setTranslation('slug', 'tr', Str::slug($request->name['tr']));

        if ($request->hasFile('category_icon')) {
            $response = UploadFile::uploadFile($request->file('category_icon'), 'serviceCategory_icons');
            $serviceSubCategory->image = $response["image"]["way"];
        }

        if ($serviceSubCategory->save()){
            return response()->json([
                'status' => "success",
                'message' => "Hizmet Eklendi"
            ]);
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ServiceSubCategory $serviceSubCategory)
    {
        $serviceCategories = ServiceCategory::all();

        return view('service.detail.edit', compact('serviceSubCategory', 'serviceCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ServiceSubCategory $serviceSubCategory)
    {
        $serviceSubCategory->name = $request->name;
        $serviceSubCategory->category_id = $request->category_id;
        $serviceSubCategory->order_number = $serviceSubCategory::max('order_number') + 1;
        $serviceSubCategory
            ->setTranslation('slug', 'de', Str::slug($request->name['de']))
            ->setTranslation('slug', 'en', Str::slug($request->name['en']))
            ->setTranslation('slug', 'es', Str::slug($request->name['es']))
            ->setTranslation('slug', 'fr', Str::slug($request->name['fr']))
            ->setTranslation('slug', 'it', Str::slug($request->name['it']))
            ->setTranslation('slug', 'tr', Str::slug($request->name['tr']));

        if ($request->hasFile('category_icon')) {
            $response = UploadFile::uploadFile($request->file('category_icon'), 'serviceCategory_icons');
            $serviceSubCategory->image = $response["image"]["way"];
        }


        if ($serviceSubCategory->save()){
            return to_route('admin.serviceSubCategory.index')->with('response',[
                'status' => "success",
                'message' => "Hizmet Güncellendi"
            ]);
        }
    }

    public function datatable()
    {
        $serviceCategory = ServiceSubCategory::orderBy('order_number', 'asc')->get();

        return DataTables::of($serviceCategory)
            ->editColumn('id', function ($q) {
                return createCheckbox($q->id, 'ServiceSubCategory', 'Hizmetleri');
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
                $html .= create_edit_button(route('admin.serviceSubCategory.edit', $q->id));
                $html .= create_delete_button('ServiceSubCategory', $q->id, 'Hizmeti', 'Hizmet Kaydını Silmek İstediğinize Eminmisiniz?');
                $html .= '</div>';

                return $html;
            })
            ->rawColumns(['id', 'action', 'created_at'])
            ->make(true);
    }
}
