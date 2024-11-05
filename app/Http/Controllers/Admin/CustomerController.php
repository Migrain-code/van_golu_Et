<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerAddRequest;
use App\Models\BusinessOfficial;
use App\Models\Customer;
use App\Models\CustomerNotificationPermission;
use App\Models\NotificationIcon;
use App\Models\SmsConfirmation;
use App\Services\Sms;
use App\Services\UploadFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.customer.index');
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
    public function store(CustomerAddRequest $request)
    {
        $customer = new Customer();
        $customer->name = $request->input('name');
        $customer->email = $request->input('email');
        $customer->phone = clearPhone($request->input('phone'));
        $customer->city_id = $request->input('city_id');
        $customer->district_id = $request->input('district_id');
        $customer->password = Hash::make($request->input('password'));
        $customer->gender = $request->input('gender');
        $customer->status = 0;
        if ($request->hasFile('profilePhoto')) {
            $customer->image = $request->file('profilePhoto')->store('customerImages');
        }
        if ($request->input('send_sms') == "1") {
            Sms::send($customer->phone, setting('speed_site_title').' Sistemine İçin Giriş Şifreniz : ' . $request->input('password'));
        }
        if ($customer->save()) {
            $this->addPermission($customer->id);
            return response()->json([
                'status' => "success",
                'message' => "Müşteri Başarılı Bir Şekilde Eklendi"
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        $noticifationIcons = NotificationIcon::all();
        return view('admin.customer.detail.show', compact('customer', 'noticifationIcons'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        $customer->name = $request->input('name');
        $customer->email = $request->input('email');
        $customer->app_phone = clearPhone($request->input('app_phone'));
        $customer->gender = $request->input('gender');
        $customer->birthday = $request->input('birthday');
        $customer->city_id = $request->input('city_id');
        $customer->district_id = $request->input('district_id');
        if ($request->hasFile('profilePhoto')) {
            $response = UploadFile::uploadFile($request->file('profilePhoto'));
            $customer->image = $response["image"]["way"];
        }
        if ($customer->save()) {
            return response()->json([
                'status' => "success",
                'message' => "Müşteri Başarılı Bir Şekilde Güncellendi"
            ]);
        }
    }

    public function updatePhone(Request $request)
    {
        if ($this->existPhone(clearPhone($request->phone))) {
            return response()->json([
                'status' => "warning",
                'message' => "Bu telefon numarası ile kayıtlı kullanıcı bulunmakta."
            ]);
        } else {

            $this->createVerifyCode($request->phone);
            return response()->json([
                'status' => "success",
                'message' => "Telefon Numarasına Gelen Doğrulama Kodunu Giriniz"
            ]);
        }
    }

    public function verifyPhone(Request $request)
    {
        $code = SmsConfirmation::where("code", clearPhone($request->input('code')))->where('action','ADMIN-PHONE-CHANGE')->first();

        if ($code) {
            if ($code->expire_at < now()) {
                $this->createVerifyCode($code->phone);
                return response()->json([
                    'status' => "warning",
                    'message' => "Doğrulama Kodunun Süresi Dolmuş. Doğrulama Kodu Tekrar Gönderildi"
                ]);

            }
            else {
                $customer = Customer::find($request->input('customer_id'));
                $customer->phone = $code->phone;
                if($customer->save()){
                    return response()->json([
                        'status' => "success",
                        'message' => "Telefon Numarası doğrulandı. Sisteme giriş için telefon numarası değiştirildi.",
                        'newPhone' => $customer->phone,
                    ]);
                }
            }
        }
        else{
            return response()->json([
                'status' => "warning",
                'message' => "Doğrulama Kodunu Hatalı Veya Eksik Tuşladınız"
            ]);
        }
    }

    public function updatePassword(Request $request)
    {
        $customer = Customer::find($request->input('customer_id'));
        if ($customer){
            $customer->password = Hash::make($request->input('password'));
            if ($customer->save()){
                if ($request->input('send_sms') == "1"){
                    Sms::send($customer->phone, setting('speed_site_title'). " Sistemine giriş için yöneticiler tarafından oluşturulan yeni şifreniz: ". $request->input('password'));
                }
                return response()->json([
                   'status' => "success",
                   'message' => "Müşteri Şifresi Güncellendi",
                ]);
            }
        } else{
            return response()->json([
                'status' => "warning",
                'message' => "Bir Hata nedeni ile müşteri şifresi güncellenemedi tekrar deneyiniz",
            ]);
        }
    }
    public function existPhone($phone)
    {
        $existPhone = Customer::where('phone', $phone)->first();
        if ($existPhone != null) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }
    function createVerifyCode($phone)
    {
        $generateCode = rand(100000, 999999);
        $smsConfirmation = new SmsConfirmation();
        $smsConfirmation->phone = clearPhone($phone);
        $smsConfirmation->action = "ADMIN-PHONE-CHANGE";
        $smsConfirmation->code = $generateCode;
        $smsConfirmation->expire_at = now()->addMinute(3);
        $smsConfirmation->save();

        Sms::send(clearPhone($phone), setting('speed_site_title') . "Sistemi yönetici için, telefon numarası doğrulama kodu:  " . $generateCode . " Bu kodu yönetici dışında kimse ile paylaşmayınız");

        return $generateCode;
    }

    public function addPermission($id)
    {
        $permission = new CustomerNotificationPermission();
        $permission->customer_id = $id;
        $permission->save();

        return $permission;
    }

    public function datatable(Request $request)
    {
        $customers = Customer::latest();

        return DataTables::of($customers)
            ->editColumn('id', function ($q) {
                return createCheckbox($q->id, 'Customer', 'Müşterileri');
            })
            ->editColumn('name', function ($q) {
                return createName(route('admin.customer.edit', $q->id), $q->name);
            })
            ->editColumn('phone', function ($q) {
                return createPhone($q->phone, $q->phone);
            })
            ->editColumn('status', function ($q) {
                return create_switch($q->id, $q->status == 1 ? true : false, 'Customer', 'status');
            })
            ->editColumn('email', function ($q) {
                return $q->email;
            })
            ->editColumn('created_at', function ($q) {
                return $q->created_at->format('d.m.Y H:i:s');
            })
            ->addColumn('action', function ($q) {
                $html = "";
                $html .= create_edit_button(route('admin.customer.edit', $q->id));
                $html .= create_delete_button('Customer', $q->id, 'Müşteri', 'Müşteri Kaydını Silmek İstediğinize Eminmisiniz?');
                return $html;
            })
            ->rawColumns(['id', 'action', 'name'])
            ->make(true);
    }
}
