<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Slider extends Model
{
    use HasFactory, HasTranslations;

    protected $translatable = ['title', 'description', 'btn_text', 'btn_link'];

    public function getTitle()
    {
        return $this->translate('title');
    }

    public function getDescription()
    {
        return $this->translate('description');
    }
    public function getButtonText()
    {
        return $this->translate('btn_text');
    }
    public function getButtonLink()
    {
        return $this->translate('btn_link');
    }
}
