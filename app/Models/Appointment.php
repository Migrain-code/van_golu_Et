<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $dates = ['start_time', 'end_time'];
    protected $fillable = ['comment_status'];
    const STATUS_LIST = [
        0 => [
            'html' => '<span class="badge badge-light-warning">Onay Bekliyor</span>',
            'text' => 'Onay Bekliyor'
        ],
        1 => [
            'html' => '<span class="badge badge-light-success">Onaylandı</span>',
            'text' => 'Onaylandı'
        ],
        2 => [
            'html' => '<span class="badge badge-light-primary">Başladı</span>',
            'text' => 'Başladı'
        ],
        3 => [
            'html' => '<span class="badge badge-light-info">Tamamlandı</span>',
            'text' => 'Tamamlandı'
        ],
        4 => [
            'html' => '<span class="badge badge-light-success">Ödeme Onaylandı</span>',
            'text' => 'Ödeme Onaylandı'
        ],
        5 => [
            'html' => '<span class="badge badge-light-danger">İptal Edildi</span>',
            'text' => 'İptal Edildi'
        ],

    ];

    public function status($type)
    {
        return self::STATUS_LIST[$this->status][$type] ?? null;
    }

    public function customer()
    {
        return $this->hasOne(Customer::class, 'id', 'customer_id');
    }

    public function services()
    {
        return $this->hasMany(AppointmentServices::class, 'appointment_id', 'id');
    }

    public function business()
    {
        return $this->hasOne(Business::class, 'id', 'business_id');
    }
}
