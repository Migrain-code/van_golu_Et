<?php

namespace App\Http\Controllers;

use App\Models\CustomerNotificationMobile;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CustomerNotificationMobileController extends Controller
{
    public function store(Request $request)
    {
        $customerNotification = new CustomerNotificationMobile();
        $customerNotification->title = $request->input('title');
        $customerNotification->slug = Str::slug($request->input('title'));
        $customerNotification->customer_id = $request->input('customer_id');
        $customerNotification->content = $request->input('notification_text');
        $customerNotification->image = $request->input('notification_icon');
        if ($request->input('is_push') == 1) {
            // Burada push notification gönderilme kodu yazılacak
        }
        if ($customerNotification->save()) {
            return response()->json([
                'status' => "success",
                'message' => "Bildirim Gönderildi"
            ]);
        } else {
            return response()->json([
                'status' => "warning",
                'message' => "Bir Hata Sebebi İle Bildirim Gönderilemedi"
            ]);
        }

    }
}
