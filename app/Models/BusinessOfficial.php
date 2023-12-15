<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class BusinessOfficial extends Authenticatable
{
    use HasFactory;

    public function business()
    {
        return $this->hasOne(Business::class, 'id', 'business_id')->withDefault([
            'name' => "İşletme Bulunamadı"
        ]);
    }

}
