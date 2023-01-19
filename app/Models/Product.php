<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_ar',
        'name_en',
        'image',
        'description_ar',
        'description_en',
        'category_id',
        'price'
    ];
    public function catagory()
    {
        return $this->belongsTo(Category::class, "category_id", "id");
    }
}