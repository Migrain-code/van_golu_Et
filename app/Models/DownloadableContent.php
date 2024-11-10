<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class DownloadableContent extends Model
{
    use HasTranslations;
    protected $translatable = ['name', 'image', 'file'];

    public function getName()
    {
        return $this->translate('name');
    }

    public function getImage()
    {
        return $this->translate('image');
    }
    public function getFile()
    {
        return $this->translate('file');
    }

}
