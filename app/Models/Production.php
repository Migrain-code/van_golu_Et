<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Production extends Model
{
    use HasTranslations;
    protected $translatable = ['name'];

    public function category()
    {
        return $this->belongsTo(ProductionCategory::class);
    }

    public function getName()
    {
        return $this->translate('name');
    }
}
