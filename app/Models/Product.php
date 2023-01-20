<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'nameAr',
        'nameEn',
        'image',
        'descriptionAr',
        'descriptionEn',
        'category_id',
        'price'
    ];
    public function catagory()
    {
        return $this->belongsTo(Category::class, "category_id", "id");
    }
}