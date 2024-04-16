<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategoryProduct extends Model
{
    use HasFactory;

    public function topCategory()
    {
        return $this->hasOne(SubCategory::class, 'id', 'category_id');
    }
}
