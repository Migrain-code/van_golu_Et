<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class Business extends Model
{
    use HasFactory;

    const STATUS_LIST=[
        0 =>[
            'status' => "danger",
            'text'=>"Engellendi",
        ],
        1=>[
            'status' => "success",
            'text'=>"Aktif",
        ],
        2=>[
            'status' => "warning",
            'text'=>"Geçici Engellendi"
        ]
    ];
    public function official()
    {
        return $this->hasOne(BusinessOfficial::class, 'id', 'admin_id')->withDefault([
            'name' => "Yönetici Bulunamadı"
        ]);
    }
    public function getUrl()
    {
        return env('USER_URL').'salon/'.$this->slug;
    }
    public function statusList($type)
    {
        return self::STATUS_LIST[$this->status][$type];
    }
    public function package()
    {
        return $this->hasOne(BussinessPackage::class, 'id', 'package_id');
    }

    public function category()
    {
        return $this->hasOne(BusinessCategory::class, 'id', 'category_id');
    }
    public function type()
    {
        return $this->hasOne(BusinnessType::class, 'id', 'type_id');
    }

    public function appointmentRange()
    {
        return $this->hasOne(AppointmentRange::class, 'id', 'appoinment_range');
    }
    public function offDay()
    {
        return $this->hasOne(DayList::class, 'id', 'off_day');
    }
    public function workTimes()
    {
        return $this->hasMany(BusinessWorkTime::class, 'business_id', 'id')->orderBy('que');
    }

    public function services()
    {
        return $this->hasMany(BusinessService::class, 'business_id', 'id');

    }

    public function personels()
    {
        return $this->hasMany(Personel::class, 'business_id', 'id');
    }

    public function sliders()
    {
        return $this->hasMany(BusinessSlider::class, 'business_id', 'id');
    }

    public function service()
    {
        return $this->hasOne(BusinessService::class, 'business_id', 'id');
    }

    public function gallery()
    {
        return $this->hasMany(BusinessGallery::class, 'business_id', 'id');
    }

    public function sales()
    {
        return $this->hasMany(ProductSales::class, 'business_id', 'id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'business_id', 'id');
    }

    public function packages()
    {
        return $this->hasMany(PackageSale::class, 'business_id', 'id');
    }

    public function customers()
    {
        return $this->hasMany(BusinessCustomer::class, 'business_id', 'id');
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'business_id', 'id');
    }

    public function cities()
    {
        return $this->hasOne(City::class, 'id', 'city');
    }

    public function permission()
    {
        return $this->hasOne(BusinessNotificationPermission::class, 'business_id', 'id');
    }

    public function districts()
    {
        return $this->hasOne(District::class, 'id', 'district');

    }

    public function comments()
    {
        return $this->hasMany(BusinessComment::class, 'business_id', 'id')->where('status', 1)->latest();
    }

    public function totalVisitors()
    {
        $total = count(array_unique($this->appointments()->pluck('customer_id')->toArray()));
        return $total;
    }
    public function monthlyVisitors()
    {
        $monthlyVisitors = [];

        $appointments = $this->appointments()->get();

        foreach ($appointments as $appointment) {
            $monthYearKey = Carbon::parse($appointment->start_time)->format('Y-m');

            if (!isset($monthlyVisitors[$monthYearKey])) {
                $monthlyVisitors[$monthYearKey] = [];
            }

            $customer_id = $appointment->customer_id;

            if (!in_array($customer_id, $monthlyVisitors[$monthYearKey])) {
                $monthlyVisitors[$monthYearKey][] = $customer_id;
            }
        }

        return $monthlyVisitors;
    }
    public function yearlyVisitors()
    {
        $yearlyVisitors = [];
        $currentYear = Carbon::now()->year;

        $appointments = $this->appointments()
            ->where(DB::raw('YEAR(STR_TO_DATE(start_time, "%d.%m.%Y %H:%i"))'), $currentYear)
            ->get();

        foreach ($appointments as $appointment) {
            $monthKey = Carbon::parse($appointment->start_time)->format('m');

            if (!isset($yearlyVisitors[$monthKey])) {
                $yearlyVisitors[$monthKey] = [];
            }

            $customer_id = $appointment->customer_id;

            if (!in_array($customer_id, $yearlyVisitors[$monthKey])) {
                $yearlyVisitors[$monthKey][] = $customer_id;
            }
        }

        return $yearlyVisitors;
    }
    public function getPermissionNames()
    {
        $permissionNames = "";
        $permission = $this->permission;
        switch (true) {
            case $permission->is_sms == 1:
                $permissionNames .= "SMS, ";
            case $permission->is_email == 1:
                $permissionNames .= "Email, ";
            case $permission->is_phone == 1:
                $permissionNames .= "Telefon, ";
            case $permission->is_notification == 1:
                $permissionNames .= "Bildirim, ";
        }
        $permissionNames = rtrim($permissionNames, ', ');

        return $permissionNames;
    }
    public function getColumnCount()
    {
        $tableName = $this->getTable();
        $columns = Schema::getColumnListing($tableName);

        return count($columns);
    }

    public function getEmptyColumnCount()
    {
        $business = $this;
        $columns = Schema::getColumnListing($business->getTable());

        $emptyColumnCount = 0;

        foreach ($columns as $column) {
            $value = $business->$column;

            if ($value === null || $value === '') {
                $emptyColumnCount++;
            }
        }

        return $emptyColumnCount;
    }

    public function profileOccupancy()
    {
        $totalColumnCount = $this->getColumnCount() + 3;
        $emptyColumnCount = $this->getEmptyColumnCount();

        if ($totalColumnCount == 0) {
            return 0; // Sıfıra bölme hatasını önlemek için kontrol
        }
        $percentage = (int) round(((($totalColumnCount - $emptyColumnCount) / $totalColumnCount) * 100));

        if ($this->personels->count() > 0){
            $percentage++;
        }
        if ($this->services->count() > 0){
            $percentage++;
        }
        if ($this->gallery->count() > 0){
            $percentage++;
        }

        return $percentage;
    }

    public function checkAppointmentIncrease()
    {
        $currentMonthStart = Carbon::now()->startOfMonth();
        $currentMonthEnd = Carbon::now()->endOfMonth();

        $appointmentsThisMonth = $this->appointments()
            ->whereBetween('start_time', [$currentMonthStart, $currentMonthEnd])
            ->count();

        $lastMonthStart = $currentMonthStart->subMonth();
        $lastMonthEnd = $currentMonthEnd->subMonth();

        $appointmentsLastMonth = $this->appointments()
            ->whereBetween('start_time', [$lastMonthStart, $lastMonthEnd])
            ->count();

        $increasePercentage = 0;
        $isIncrease = true;

        if ($appointmentsLastMonth > 0) {
            $increasePercentage = (($appointmentsThisMonth - $appointmentsLastMonth) / $appointmentsLastMonth) * 100;
            $isIncrease = $appointmentsThisMonth > $appointmentsLastMonth;
        }

        return [
            'isIncrease' => $isIncrease,
            'increasePercentage' => round($increasePercentage),
            'appointmentsThisMonth' => $appointmentsThisMonth,
            'appointmentsLastMonth' => $appointmentsLastMonth,
        ];
    }

    public function calculateEarningsAndIncrease()
    {
        $currentMonthStart = Carbon::now()->startOfMonth();
        $currentMonthEnd = Carbon::now()->endOfMonth();

        // Bu aydaki randevuların toplamını bul
        $appointmentsThisMonth = $this->appointments()
            ->whereBetween('start_time', [$currentMonthStart, $currentMonthEnd])
            ->get();

        // Bu aydaki randevuların toplam kazancını bul
        $totalEarningsThisMonth = $appointmentsThisMonth->sum(function ($appointment) {
            return $appointment->services->sum('service.price');
        });

        // Önceki aydaki randevuların toplamını bul
        $lastMonthStart = $currentMonthStart->subMonth();
        $lastMonthEnd = $currentMonthEnd->subMonth();

        $appointmentsLastMonth = $this->appointments()
            ->whereBetween('start_time', [$lastMonthStart, $lastMonthEnd])
            ->get();

        // Önceki aydaki randevuların toplam kazancını bul
        $totalEarningsLastMonth = $appointmentsLastMonth->sum(function ($appointment) {
            return $appointment->services->sum('service.price');
        });

        $increasePercentage = 0;
        $isIncrease = true;

        if ($totalEarningsLastMonth > 0) {
            $increasePercentage = (($totalEarningsThisMonth - $totalEarningsLastMonth) / $totalEarningsLastMonth) * 100;
            $isIncrease = $totalEarningsThisMonth > $totalEarningsLastMonth;
        }

        return [
            'isIncrease' => $isIncrease,
            'increasePercentage' => round($increasePercentage),
            'earningsThisMonth' => $totalEarningsThisMonth,
            'earningsLastMonth' => $totalEarningsLastMonth,
        ];
    }
}
