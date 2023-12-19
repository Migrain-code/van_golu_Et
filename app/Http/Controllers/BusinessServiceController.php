<?php

namespace App\Http\Controllers;

use App\Http\Requests\BusinessServiceAddRequest;
use App\Models\Business;
use App\Models\BusinessService;
use App\Models\BusinnessType;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class BusinessServiceController extends Controller
{
    public function index()
    {
        $business_id = \Session::get('business_id');
        $categories = ServiceCategory::all();
        $business = Business::find($business_id);
        $businessTypes = BusinnessType::all();
        if ($business){
            return view('business.services.index', compact('business', 'categories', 'businessTypes'));
        } else{
            return back()->with('response', [
               'status' => "error",
               'message' => "İşletme Bulunamadı"
            ]);
        }
    }

    public function store(BusinessServiceAddRequest $request)
    {
        $existService = $this->existService($request);
        if ($existService){
            return response()->json([
                'status' => "error",
                'message' => "Bu Hizmet Zaten Eklediniz. Aynı Hizmeti Tekrar Ekleyemezsiniz"
            ]);
        }
        $businessService = new BusinessService();
        if ($request->input('type_id') == 3) {
            // İlk durum
            $this->serviceCreator($businessService, 1, $request);
            // ikinci durum
            $businessService2 = new BusinessService();
            $this->serviceCreator($businessService2, 2, $request);
        } else {
            $this->serviceCreator($businessService, $request->input('type_id'), $request);

        }

        return response()->json([
            'status' => "success",
            'message' => "Hizmet Başarılı Bir Şekilde Eklendi"
        ]);
    }

    public function update(BusinessService $businessService,Request $request)
    {
        $existService = $this->existService($request);
        if ($existService){
            return back()->with('response',[
                'status' => "error",
                'message' => "Bu Hizmet Kayıtlı veya Bir Güncelleme Yapmadınız"
            ]);
        }

        $this->serviceCreator($businessService, $request->input('type_id'), $request);

        return to_route('admin.businessService.index')->with('response',[
            'status' => "success",
            'message' => "Hizmet Başarılı Bir Şekilde Güncellendi"
        ]);
    }
    public function existService($request)
    {
        $existService = BusinessService::where('business_id', $request->input('business_id'))
            ->where(function ($query) use ($request) {
                $typeId = $request->input('type_id');
                if ($typeId == 3) {
                    // Eğer type_id 3 ise, type 1 veya 2 olan kayıtları da kontrol et
                    $query->whereIn('type', [1,2]);
                } else {
                    $query->where('type', $typeId);
                }
            })
            ->where('price', $request->input('price'))
            ->where('time', $request->input('time'))
            ->where('category', $request->input('category_id'))
            ->where('sub_category', $request->input('sub_category_id'))
            ->exists();
        return $existService;
    }
    public function serviceCreator($businessService, $type, $request)
    {
        $businessService->business_id = $request->input('business_id');
        $businessService->category = $request->input('category_id') ?? $businessService->category;
        $businessService->sub_category = $request->input('sub_category_id');
        $businessService->time = $request->input('time');
        $businessService->price = $request->input('price');
        $businessService->type = $type;
        $businessService->status = 1;
        $businessService->save();
        return $businessService;
    }
    public function edit(BusinessService $businessService)
    {
        $business_id = \Session::get('business_id');
        $categories = ServiceCategory::all();
        $business = Business::find($business_id);
        $businessTypes = BusinnessType::all();
        if ($business){
            return view('business.services.detail.edit', compact('business', 'categories', 'businessTypes', 'businessService'));
        } else{
            return back()->with('response', [
                'status' => "error",
                'message' => "İşletme Bulunamadı"
            ]);
        }
    }

    public function serviceGet(Request $request)
    {
        $serviceCategory = ServiceCategory::find($request->service_category_id);

        $subCategories= $serviceCategory->subCategories()->get();

        return $subCategories;
    }
    public function datatable()
    {
        $business_id = \Session::get('business_id');
        $businessServices = BusinessService::where('business_id', $business_id)->orderBy('order_number', 'asc')->get();

        return DataTables::of($businessServices)
            ->editColumn('id', function ($q) {
                return createCheckbox($q->id, 'BusinessService', 'Hizmetleri');
            })
            ->editColumn('name', function ($q) {
                return $q->subCategory->getName();
            })
            ->editColumn('type', function ($q) {
                return $q->gender->name;
            })
            /*->editColumn('image', function ($q) {
                return html()->img(image($q->categorys->image))->class('w-50px h-50px rounded object-fit-cover');
            })*/
            ->editColumn('created_at', function ($q) {
                return $q->created_at->format('d.m.Y H:i:s');
            })
            ->addColumn('action', function ($q) {
                $html = '<div class="d-flex justify-content-center align-items-center">';
                $html .= create_edit_button(route('admin.businessService.edit', $q->id));
                $html .= create_delete_button('BusinessService', $q->id, 'Hizmet', 'Hizmet Kaydını Silmek İstediğinize Eminmisiniz?');
                $html .= '</div>';

                return $html;
            })
            ->rawColumns(['id', 'action', 'created_at'])
            ->make(true);
    }

}
