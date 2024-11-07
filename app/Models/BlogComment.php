<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class BlogComment extends Model
{
    use HasFactory, HasTranslations;
    protected $translatable = ['username', 'comment'];
    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }
    public function getUserName()
    {
        return $this->translate('username');
    }

    public function getComment()
    {
        return $this->translate('comment');
    }
}
