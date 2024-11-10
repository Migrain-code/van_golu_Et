<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Product extends Model
{
    use HasTranslations;

    public $translatable = ['name', 'slug', 'meta_title', 'meta_description', 'description', 'advantage', 'technic'];
    public function category()
    {
        return $this->hasOne(Series::class, 'id', 'group_id');
    }
    public function references()
    {
        return $this->hasMany(ProductReference::class, 'product_id', 'id');
    }
    public function getName()
    {
        return $this->translate('name');
    }

    public function getSlug()
    {
        return $this->translate('slug');
    }

    public function getMetaTitle()
    {
        return $this->translate('meta_title');
    }

    public function getMetaDescription()
    {
        return $this->translate('meta_description');
    }

    public function getDescription()
    {
        return $this->translate('description');
    }

    public function getAdvantage()
    {
        return $this->translate('advantage');
    }

    public function getTechnic()
    {
        return $this->translate('technic');
    }
}
