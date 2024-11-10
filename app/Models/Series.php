<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Series extends Model
{
    use HasTranslations;

    public $translatable = ['name', 'slug', 'description', 'meta_title', 'meta_description'];

    public function parent()
    {
        return $this->hasOne(SubCategorySon::class, 'id', 'category_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'group_id', 'id')->where('status', 1);
    }

    public function getName()
    {
        return $this->translate('name');
    }

    public function getSlug()
    {
        return $this->translate('slug');
    }

    public function getDescription()
    {
        return $this->translate('description');
    }

    public function getMetaTitle()
    {
        return $this->translate('meta_title');
    }

    public function getMetaDescription()
    {
        return $this->translate('meta_description');
    }
}
