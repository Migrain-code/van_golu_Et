<?php

namespace App\Http\Controllers;

use App\Models\BusinessComment;
use App\Models\CustomerFaqCategory;
use App\Models\CustomerNotificationPermission;
use App\Models\District;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function updateFeatured(Request $request)
    {
        $query = $request->model::find($request->id);
        $query->{$request->column} = $request->value;

        if ($query->save()) {
            return [
                'status' => 'success',
                'message' => 'Durum güncellendi'
            ];
        }

        return [
            'status' => 'error',
            'message' => 'Sistemde oluşan bir hata nedeniyle işleminiz yapılamadı !'
        ];
    }

    public function deleteFeatured(Request $request)
    {
        $query = $request->model::find($request->id);

        if ($query){
            $query->delete();
            return response()->json([
                'status' => 'success',
                'message' => $request->input('title'). " Kaydı Silindi"
            ]);
        }
        else{
            return response()->json([
                'status' => 'warning',
                'message' => 'Bir Hata Sebebiyle '. $request->input('title'). "Silinemedi"
            ]);
        }
    }

    public function deleteAllFeatured(Request $request)
    {
        foreach ($request->ids as $id){
            $query = $request->model::find($id);
            if ($query){
                $query->delete();

            }
        }

        return response()->json([
            'status' => 'success',
            'message' => $request->input('title'). " Kaydı Silindi"
        ]);

    }

    public function getDistrict(Request $request)
    {
        $districts = District::where('city_id', $request->id)->get();

        return $districts;
    }

    public function updateServiceCategoryOrder(Request $request)
    {
        $serviceCategory = ServiceCategory::find($request->category_id);
        if ($serviceCategory){
            $findOrderNumber = ServiceCategory::where('order_number', $request->after_order)->first();
            $findOrderNumber->order_number = $request->before_order;

            if ($findOrderNumber->save()){
                $serviceCategory->order_number = $request->after_order;
                $serviceCategory->save();
                return response()->json([
                   'status' => "success",
                   'message' => "Kategori Sırası Güncellendi",
                ]);
            }
        }
        else {
            return response()->json([
                'status' => "warning",
                'message' => "Hizmet Kategorisi Bulunamadı",
            ]);
        }
    }

    public function updateCustomerFaqCategoryOrder(Request $request)
    {

        $customerFaq = CustomerFaqCategory::find($request->category_id);
        if ($customerFaq){
            $findOrderNumber = CustomerFaqCategory::where('order_number', $request->after_order)->first();

            if ($findOrderNumber){
                $findOrderNumber->order_number = $request->before_order;

                if ($findOrderNumber->save()){
                    $customerFaq->order_number = $request->after_order;
                    $customerFaq->save();
                    return response()->json([
                        'status' => "success",
                        'message' => "Kategori Sırası Güncellendi",
                    ]);
                }
            }
            else{
                return response()->json([
                    'status' => "warning",
                    'message' => "SSS Kategorisi Bulunamadı",
                ]);
            }
        }
        else {
            return response()->json([
                'status' => "warning",
                'message' => "SSS Kategorisi Bulunamadı",
            ]);
        }
    }
}
