<?php

namespace App\Http\Controllers;

use App\Http\Requests\BusinessAddRequest;
use App\Models\AppointmentRange;
use App\Models\Business;
use App\Models\BusinessCategory;
use App\Models\BusinessNotificationPermission;
use App\Models\BusinessOfficial;
use App\Models\BusinnessType;
use App\Models\CustomerNotificationPermission;
use App\Models\DayList;
use App\Services\Sms;
use App\Services\UploadFile;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class BusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = BusinessCategory::all();
        $dayList = DayList::all();
        $appointmentRanges = AppointmentRange::all();
        return view('business.index', compact('categories', 'dayList', 'appointmentRanges'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(BusinessAddRequest $request)
    {
        $business = new Business();
        $business->name = $request->input('name');
        $business->admin_id = 0;
        $business->category_id = $request->input('category_id');
        $business->company_id = $this->generateUniqueIdentifier();
        $business->package_id = 1;
        $business->slug = Str::slug($request->name);
        $business->packet_start_date = Carbon::now();
        $business->packet_end_date = Carbon::now()->addDays(15);
        $business->status = 0;
        $business->is_main = 1;
        $business->setup_status = 0;
        $business->personal_count = $request->input('personal_count');
        $business->lat = $request->input('latitude');
        $business->longitude = $request->input('longitude');
        $business->off_day = $request->input('off_day');
        $business->start_time = $request->input('start_time');
        $business->end_time = $request->input('end_time');
        $business->year = Carbon::parse($request->input('year'))->format('Y-m-d');
        $business->approve_type = $request->input('approve_type');
        $business->appoinment_range = $request->input('appointment_range');
        $business->type_id = $request->input('campaign_gender');
        $business->city = $request->input('city_id');
        $business->district = $request->input('district_id');
        $business->embed = $request->input('embed');

        if ($request->hasFile('logo')) {
            $response = UploadFile::uploadFile($request->file('logo'), 'businessLogos');
            $business->logo = $response["image"]["way"];
        }
        if ($business->save()) {
            $businessOfficial = $this->addOfficial($business->id, $request);
            $business->admin_id = $businessOfficial->id;
            $this->addPermission($businessOfficial->id);
            if ($request->send_sms == 1) {
                Sms::send($businessOfficial->phone, setting('appy_site_title') . " Sistemine giriş için şifreni: " . $request->input('password'));
            }
            return response()->json([
                'status' => "success",
                'message' => "Müşteri Başarılı Bir Şekilde Eklendi"
            ]);
        }


    }

    /**
     * Display the specified resource.
     */
    public function edit(Business $business)
    {
        \Session::put('business_id', $business->id);
        $months = [];
        for ($i = 1; $i <= 12; $i++) {
            $monthKey = str_pad($i, 2, '0', STR_PAD_LEFT); // Ay numarasını iki basamaklı bir stringe dönüştür

            if (array_key_exists($monthKey, $business->yearlyVisitors())) {
                $months[] = count($business->yearlyVisitors()[$monthKey]);
            } else{
                $months[] = 0;
            }
        }
        $customers = $business->customers()->where('created_at', '>', Carbon::now()->subDays(15))->take(15)->get();

        $categories = BusinessCategory::all();

        return view('business.detail.show', compact('categories', 'business', 'months', 'customers'));
    }
    public function update(Business $business,Request $request)
    {

        $business->name = $request->input('name');
        $business->business_email = $request->input('business_email');
        $business->phone = $request->input('phone');
        $business->category_id = $request->input('category_id');
        $business->slug = Str::slug($request->name);
        $business->personal_count = $request->input('personal_count');
        $business->off_day = $request->input('off_day');
        $business->start_time = $request->input('start_time');
        $business->end_time = $request->input('end_time');
        $business->year = Carbon::parse($request->input('year'))->format('Y-m-d');
        $business->approve_type = $request->input('approve_type');
        $business->appoinment_range = $request->input('appointment_range');
        $business->type_id = $request->input('business_type');
        $business->city = $request->input('city_id');
        $business->district = $request->input('district_id');
        $business->address = $request->input('address');
        if ($request->hasFile('avatar')) {
            $response = UploadFile::uploadFile($request->file('avatar'), 'businessLogos');
            $business->logo = $response["image"]["way"];
        }
        if ($business->save()) {
            return back()->with('response', [
                'status' => "success",
                'message' => "İşletme Bilgileri Başarılı Bir Şekilde Güncellendi"
            ]);
        }


    }
    public function settings(Business $business)
    {
        $dayList = DayList::all();
        $appointmentRanges = AppointmentRange::all();
        $businessTypes = BusinnessType::all();
        return view('business.detail.settings', compact('business', 'businessTypes', 'dayList', 'appointmentRanges'));
    }
    function generateUniqueIdentifier($length = 8, $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ')
    {

        $identifier = Str::random($length);

        while (Business::where('company_id', $identifier)->exists()) {
            $identifier = Str::random($length);
        }

        return $identifier;
    }

    public function addOfficial($id, $request)
    {
        $businessOfficial = new BusinessOfficial();
        $businessOfficial->name = $request->input('official_name');
        $businessOfficial->phone = clearPhone($request->input('phone'));
        $businessOfficial->password = Hash::make($request->input('password'));
        $businessOfficial->email = $request->input('email');
        $businessOfficial->business_id = $id;
        $businessOfficial->save();
        return $businessOfficial;
    }

    public function addPermission($id)
    {
        $permission = new BusinessNotificationPermission();
        $permission->business_id = $id;
        $permission->save();

        return $permission;
    }

    public function changeOfficialPhone(Request $request)
    {
        $official = BusinessOfficial::find($request->official_id);
        if ($official){
            $phone = clearPhone($request->official_phone);
            $existOfficial = BusinessOfficial::where('phone', $phone)->first();
            if ($official->phone == $phone){
                return response()->json([
                    'status' => "info",
                    'message' => "Aynı Telefon Numarasını Tuşladınız"
                ]);
            } else{
                if ($existOfficial){
                    return response()->json([
                        'status' => "info",
                        'message' => "Bu telefon numarası ile kayıtlı yetkili bulunmakta"
                    ]);
                } else{
                    $official->phone = $phone;
                    $official->save();
                    return response()->json([
                        'status' => "success",
                        'message' => "İşletme Yetkilisi Telefon Numarası Güncellendi",
                        'newPhone'=> $official->phone,
                    ]);
                }
            }

        } else{
            return response()->json([
                'status' => "error",
                'message' => "İşletme Yetkilisi Bulunamadı"
            ]);
        }
    }
    public function changeOfficialPassword(Request $request)
    {
        $official = BusinessOfficial::find($request->official_id);
        if ($official){
            $official->password = $request->input('password');
            $official->save();
            /*if ($request->send_sms == 1) {
                Sms::send($official->phone, setting('appy_site_title') . " Sistemine giriş için şifreni: " . $request->input('password'));
            }*/
            return response()->json([
                'status' => "success",
                'message' => "İşletme Yetkili Şifresi Güncellendi",
                'newPhone'=> $official->phone,
            ]);

        } else{
            return response()->json([
                'status' => "error",
                'message' => "İşletme Yetkilisi Bulunamadı"
            ]);
        }
    }

    public function changeBusinessStatus(Request $request)
    {
        $business = Business::find($request->business_id);
        if ($business){
            $business->status = $business->status == 1 ? 0 : 1;
            $business->save();

            if($business->status == 1){
                return response()->json([
                    'status' => "success",
                    'message' => "İşletme Aktif Edildi. Tüm Özelliklere Erişebilir",
                ]);
            } else{
                return response()->json([
                    'status' => "info",
                    'message' => "İşletme Hesabı Engellendi.Artık Hiçbir Yetkili Bu İşletme Bilgilerine Erişemeyecek",
                ]);
            }

        } else{
            return response()->json([
                'status' => "error",
                'message' => "İşletme Bulunamadı"
            ]);
        }
    }
    public function datatable(Request $request)
    {
        $businesses = Business::orderBy('order_number', 'asc');

        return DataTables::of($businesses)
            ->editColumn('id', function ($q) {
                return createCheckbox($q->id, 'Business', 'İşletmeyi');
            })
            ->editColumn('name', function ($q) {
                $html = "";
                $html .= html()->img(image($q->logo))->class('w-35px h-35px me-2 rounded');
                $html .= createName(route('admin.business.edit', $q->id), $q->name);
                return $html;
            })
            ->editColumn('phone', function ($q) {
                return createPhone($q->phone, $q->phone);
            })
            ->editColumn('status', function ($q) {
                return create_switch($q->id, $q->status == 1 ? true : false, 'Business', 'status');
            })
            ->editColumn('city_id', function ($q) {
                return $q->cities->name . "," . $q->districts->name;
            })
            ->editColumn('created_at', function ($q) {
                return $q->created_at->format('d.m.Y H:i:s');
            })
            ->addColumn('action', function ($q) {
                $html = "";
                $html .= create_edit_button(route('admin.business.edit', $q->id));
                $html .= create_delete_button('Business', $q->id, 'İşletme', 'İşletme Kaydını Silmek İstediğinize Eminmisiniz?');
                return $html;
            })
            ->rawColumns(['id', 'action', 'name'])
            ->make(true);
    }
}
