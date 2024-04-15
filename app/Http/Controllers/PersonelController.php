<?php

namespace App\Http\Controllers;

use App\Http\Requests\Personel\PersonalAddRequest;
use App\Models\AppointmentRange;
use App\Models\Business;
use App\Models\BusinnessType;
use App\Models\DayList;
use App\Models\Personel;
use App\Models\PersonelRestDay;
use App\Models\PersonelService;
use App\Services\Sms;
use App\Services\UploadFile;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\DataTables;

class PersonelController extends Controller
{
    public function index()
    {
        $business_id = \Session::get('business_id');

        $business = Business::find($business_id);
        $businessTypes = BusinnessType::all();
        if ($business){
            return view('business.personels.index', compact('business', 'businessTypes'));
        } else{
            return back()->with('response', [
                'status' => "error",
                'message' => "İşletme Bulunamadı"
            ]);
        }
    }
    public function store(PersonalAddRequest $request)
    {
        $user = $request->user();
        $business = $user->business;

        $personel = new Personel();
        $personel->business_id = $business->id;
        $personel->name = $request->input('name');
        $personel->image = "business/team.png";
        $personel->email = $request->email;
        $personel->password = Hash::make($request->password);
        $personel->phone = $request->phone;
        $personel->accepted_type = $request->approveType;
        $personel->accept = $request->accept;
        $personel->start_time = $request->startTime;
        $personel->end_time = $request->endTime;
        $personel->food_start = $request->foodStart;
        $personel->food_end = $request->foodEnd;
        $personel->gender = $business->type->id == 3 ? $request->gender : $business->type->id;
        $personel->rate = $request->rate;
        $personel->range = $request->appointmentRange;
        $personel->description = $request->description;

        $dayList = DayList::all();

        if ($request->hasFile('logo')){
            $response = UploadFile::uploadFile($request->file('logo'), 'personel_images');
            $personel->image = $response["image"]["way"];
        }
        if ($personel->save()) {
            foreach ($dayList as $day){
                $restDay = new PersonelRestDay();
                $restDay->personel_id = $personel->id;
                $restDay->day_id = $day->id;
                $restDay->status = in_array($day->id, $request->restDay) ? 1 : 0;
                $restDay->save();
            }
            if (in_array('all', explode(',', $request->services))) {
                foreach ($business->services as $service) {
                    $personelService = new PersonelService();
                    $personelService->service_id = $service->id;
                    $personelService->personel_id = $personel->id;
                    $personelService->save();
                }
            } else {
                foreach (explode(',', $request->services) as $service) {
                    $personelService = new PersonelService();
                    $personelService->service_id = $service;
                    $personelService->personel_id = $personel->id;
                    $personelService->save();
                }
            }
            return response()->json([
                'status' => "success",
                'message' => "Personel Eklendi",
            ]);
        }

        return response()->json([
            'status' => "error",
            'message' => "Personel Eklenirken Bir Hata Oluştu Lütfen Tekrar Deneyin",
        ]);
    }

    public function edit(Personel $personel)
    {
        $workTimes = [];
        for($i = Carbon::parse($personel->business->start_time); $i < Carbon::parse($personel->business->end_time); $i->addMinute($personel->business->appointmentRange->time)){
            $workTimes[] = $i->format('H:i');
        }

        $womanServicesArray = $personel->business->services()->where('type', 1)->with('categorys')->get();
        dd($womanServicesArray);
        $womanServiceCategories = $womanServicesArray->groupBy('categorys.name');
        $womanServices = $this->transformServices($womanServiceCategories);
        dd($womanServices);
        $manServicesArray = $personel->business->services()->where('type', 2)->with('categorys')->get();
        $manServiceCategories = $manServicesArray->groupBy('categorys.name');
        $manServices = $this->transformServices($manServiceCategories);

        $unisexServicesArray = $personel->business->services()->where('type', 3)->with('categorys')->get();
        $unisexServiceCategories = $unisexServicesArray->groupBy('categorys.name');
        $unisexServices = $this->transformServices($unisexServiceCategories);

        $appointmentRanges = AppointmentRange::all();
        $dayList = DayList::all();
        $restDays = $personel->restDays()->where('status', 1)->pluck("day_id")->toArray();
        $genderTypes = BusinnessType::all();
        return view('business.personels.detail.show', compact('personel', 'appointmentRanges', 'dayList', 'restDays', 'workTimes', 'genderTypes', 'womanServices', 'manServices', 'unisexServices'));
    }
    function transformServices($womanServiceCategories){
        $transformedDataWoman = [];
        foreach ($womanServiceCategories as $category => $services) {

            $transformedServices = [];
            foreach ($services as $service) {
                if ($service->personels->count() > 0){
                    $transformedServices[] = [
                        'id' => $service->id,
                        'name' => $service->subCategory->getName(),
                        'price' => $service->price,
                    ];
                }
            }
            $transformedDataWoman[] = [
                'id' => $services->first()->category,
                'name' => $category,
                'services' => $transformedServices,
            ];
        }
        return $transformedDataWoman;
    }
    public function update(Request $request, Personel $personel)
    {

        $customer = new Request();
        $customer->name = $request->input('name');
        $customer->email = $request->input('email');
        $customer->phone = clearPhone($request->input('phone'));
        $customer->city_id = $request->input('city_id');
        $customer->district_id = $request->input('district_id');
        $customer->password = Hash::make($request->input('password'));
        $customer->gender = $request->input('gender');
        $customer->status = 0;
        if ($request->hasFile('profilePhoto')) {
            $response = UploadFile::uploadFile($request->file('profilePhoto'));
            $customer->image = $response["image"]["way"];
        }
        if ($request->input('send_sms') == "1") {
            Sms::send($customer->phone, 'Hızlı Randevu Sistemine İçin Giriş Şifreniz : ' . $request->input('password'));
        }
        $dayList = DayList::all();

        if ($customer->save()) {
            $this->addPermission($customer->id);
            return response()->json([
                'status' => "success",
                'message' => "Müşteri Başarılı Bir Şekilde Eklendi"
            ]);
        }
    }
    public function datatable()
    {
        $personels = Personel::where('business_id', Session::get('business_id'))->latest();

        return DataTables::of($personels)
            ->editColumn('id', function ($q) {
                return createCheckbox($q->id, 'Personel', 'Personelleri');
            })
            ->editColumn('name', function ($q) {
                return createName(route('admin.personel.edit', $q->id), $q->name);
            })
            ->editColumn('phone', function ($q) {
                return createPhone($q->phone, $q->phone);
            })
            ->editColumn('status', function ($q) {
                return create_switch($q->id, $q->status == 1 ? true : false, 'Personel', 'status');
            })
            ->editColumn('created_at', function ($q) {
                return $q->created_at->format('d.m.Y H:i:s');
            })
            ->addColumn('action', function ($q) {
                $html = "";
                $html .= create_edit_button(route('admin.personel.edit', $q->id));
                $html .= create_delete_button('Personel', $q->id, 'Personeli', 'Personel Kaydını Silmek İstediğinize Eminmisiniz?');
                return $html;
            })
            ->rawColumns(['id', 'action', 'name'])
            ->make(true);
    }
}
