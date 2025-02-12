<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class MainPage extends Model
{
    use HasFactory, HasTranslations;
    protected $translatable = ['title','sub_title', 'description', 'box_1_title', 'box_1_counter', 'box_2_title','box_2_counter','box_3_title','box_3_counter'];

    public function getTitle()
    {
        return $this->translate('title');
    }

    public function getSubTitle()
    {
        return $this->translate('sub_title');
    }

    public function getDescription()
    {
        return $this->translate('description');
    }

    // Box 1 başlık getirme metodu
    public function getBox1Title()
    {
        return $this->translate('box_1_title');
    }

    // Box 1 sayacı getirme metodu
    public function getBox1Counter()
    {
        return $this->translate('box_1_counter');
    }

    // Box 2 başlık getirme metodu
    public function getBox2Title()
    {
        return $this->translate('box_2_title');
    }

    // Box 2 sayacı getirme metodu
    public function getBox2Counter()
    {
        return $this->translate('box_2_counter');
    }

    // Box 3 başlık getirme metodu
    public function getBox3Title()
    {
        return $this->translate('box_3_title');
    }

    // Box 3 sayacı getirme metodu
    public function getBox3Counter()
    {
        return $this->translate('box_3_counter');
    }
}
