<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{
    use HasTranslations;

    public $translatable = ['name', 'slug', 'meta_title', 'meta_description'];

    // Alt kategoriler için ilişki
    public function subcategories()
    {
        return $this->hasMany(SubCategory::class, 'category_id', 'id');
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
}
