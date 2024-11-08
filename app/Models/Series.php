<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Series extends Model
{
    use HasTranslations;

    public $translatable = ['name', 'slug', 'description'];

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
}
