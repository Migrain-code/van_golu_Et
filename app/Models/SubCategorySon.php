<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class SubCategorySon extends Model
{
    use HasTranslations;

    public $translatable = ['name', 'slug'];

    public function series()
    {
        return $this->hasMany(Series::class, 'category_id', 'id');
    }

    public function getName()
    {
        return $this->translate('name');
    }

    public function getSlug()
    {
        return $this->translate('slug');
    }
}
