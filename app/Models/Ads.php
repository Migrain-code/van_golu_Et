<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Ads extends Model
{
    use HasFactory, HasTranslations;
    protected $fillable = ['id', 'title', 'description'];
    protected $translatable = ['title', 'description'];
    const TYPE_LIST = [
        0 => [
            'name' => "Anasayfa Reklamları",
        ],
        1 => [
            'name' => "M.A. Sayfa Üst Reklamları",
        ],
        2 => [
            'name' => "M.A. Sayfa Alt Reklamları",
        ],
        3 => [
            'name' => "M.A. Sayfa Footer Reklamları"
        ],
        4 => [
            'name' => "Blog Reklamları"
        ],
        5 => [
            'name' => "Etkinlik Reklamları"
        ],
    ];

    public function type()
    {
        return self::TYPE_LIST[$this->type];
    }

    public function getTitle()
    {
        return $this->translate('title');
    }

    public function getDescription()
    {
        return $this->translate('description');
    }
}
