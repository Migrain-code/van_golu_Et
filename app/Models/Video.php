<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Video extends Model
{
    use HasTranslations;
    protected $translatable = ['title', 'embed_code'];

    public function getTitle()
    {
        return $this->translate('title');
    }

    public function getEmbedCode()
    {
        return $this->translate('embed_code');
    }
}
