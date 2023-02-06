<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;
    protected $fillable = [
        'image',
        'nameAr',
        'nameEn',
        'descriptionAr',
        'descriptionEn',
    ];
    protected $hidden = ['created_at', 'updated_at'];
}