<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class ProductionCategory extends Model
{
    use HasTranslations;

    public $translatable = ['name', 'slug', 'meta_title', 'meta_description'];

    public function productions()
    {
        return $this->hasMany(Production::class, 'category_id', 'id')->where('status', 1);
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
