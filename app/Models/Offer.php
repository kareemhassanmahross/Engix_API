<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;
    protected $fillable = [
        'nameAr',
        'nameEn',
        'image',
        'descriptionAr',
        'descriptionEn',
        'expiresDate',
        'category_offer_id'
    ];

    public function categoryOffer()
    {
        return $this->belongsTo(CategoryOffer::class, 'category_offer_id', 'id');
    }
}