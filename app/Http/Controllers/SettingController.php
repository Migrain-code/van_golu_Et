<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Services\UploadFile;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function customer()
    {
        return view('settings.customer.index');
    }

    public function business()
    {
        return view('settings.business.index');
    }

    public function update(Request $request)
    {
        foreach ($request->except('_token') as $key => $item) {
            if ($request->hasFile($key)) {
                $item = $request->file($key)->store('settings');
            }

            $query = Setting::query()->whereName($key)->first();
            if ($query) {
                if ($query->value != $item) {
                    $query->name = $key;
                    $query->value = $item;
                    $query->save();
                }
            } else {
                $newQuery = new Setting();
                $newQuery->name = $key;
                $newQuery->value = $item;
                $newQuery->save();
            }
        }

        if (\request()->ajax()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Ayarlar başarıyla kaydedildi.'
            ]);
        } else {
            return back()->with('response', [
                'status'=>"success",
                'message'=>"Ayarlar Güncellendi"
            ]);
        }
    }
}
