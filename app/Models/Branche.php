<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Branche extends Model
{
    use HasFactory, HasTranslations;
    public $translatable = ['name', 'address', 'phone', 'email', 'link', 'slug'];

    public function getName()
    {
        return $this->translate('name');
    }
    public function getSlug()
    {
        return $this->translate('slug');
    }

    public function getAddress()
    {
        return $this->translate('address');
    }

    public function getPhone()
    {
        return $this->translate('phone');
    }

    public function getEmail()
    {
        return $this->translate('email');
    }

    public function getLink()
    {
        return $this->translate('link');
    }
}
