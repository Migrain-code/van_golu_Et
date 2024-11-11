<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class NewsPaper extends Model
{
    use HasTranslations;
    protected $translatable = ['title','link'];

    public function getTitle()
    {
        return $this->translate('title');
    }

    public function getLink()
    {
        return $this->translate('link');
    }
}
