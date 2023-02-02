<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    use HasFactory;
    protected $fillable = [
        'image',
        'whoWeAreAr',
        'whoWeAreEn',
        'ourVisionAr',
        'ourVisionEn',
        'ourMissionAr',
        'ourMissionEn',
    ];
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}