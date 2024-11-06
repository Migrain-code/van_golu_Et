<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Blog extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = ['name', 'slug', 'meta_title', 'meta_description', 'content'];

    public function category()
    {
        return $this->belongsTo(BlogCategory::class);
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

    public function getContent()
    {
        return $this->translate('content');
    }
}
