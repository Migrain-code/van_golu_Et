<?php

namespace App\Http\Controllers;

use App\Http\Requests\BusinessAddRequest;
use App\Models\AppointmentRange;
use App\Models\Business;
use App\Models\BusinessCategory;
use App\Models\BusinessNotificationPermission;
use App\Models\BusinessOfficial;
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
     * Show the form for creating a new resource.
     */
    public function create()
    {

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
            $response = UploadFile::uploadFile($request->file('businessLogos'));
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
    public function show(Business $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Business $customer)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Business $customer)
    {

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
