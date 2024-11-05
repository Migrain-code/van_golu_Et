<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BusinessComment;
use App\Models\BusinessFaqCategory;
use App\Models\CustomerFaqCategory;
use App\Models\District;
use App\Models\ServiceCategory;
use App\Models\Variant;
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

    public function getVariantOption(Request $request)
    {
        $variant  = Variant::where('id', $request->variation_id)->first();

        return $variant->options;
    }

}
