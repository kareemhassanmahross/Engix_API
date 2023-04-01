<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'nameAr',
        'nameEn',
        'amount',
        'descriptionAr',
        'descriptionEn',
        'sub_category_id',
        'priceBefore',
        'priceAfter',
        'commition',
        'spacialProduct',
        'brand'
    ];
    protected $hidden = ["created_at", "updated_at"];
    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => json_decode($value, true),
            set: fn ($value) => json_encode($value),
        );
    }
    public function images()
    {
        return $this->hasMany(Image::class);
    }
    public function subcatagory()
    {
        return $this->belongsTo(SubCategory::class, "sub_category_id", "id");
    }
}