<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryOffer extends Model
{
    use HasFactory;
    protected $fillable = ['nameAr', 'nameEn'];
    protected $hidden = ["created_at", "updated_at"];

    public function offer()
    {
        return $this->hasMany(Offer::class);
    }
}