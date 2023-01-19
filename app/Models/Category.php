<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'categoryName_ar',
        'categoryName_en',
        'subCategory_ar',
        'subCategory_en',
    ];
    public function product()
    {
        return $this->hasMany(Product::class);
    }
}