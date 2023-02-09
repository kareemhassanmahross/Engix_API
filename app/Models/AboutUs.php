<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class AboutUs extends Model
{
    use HasFactory, Notifiable;
    protected $fillable = [
        'image',
        'whoWeAreAr',
        'whoWeAreEn',
        'ourVisionAr',
        'ourVisionEn',
        'ourMissionAr',
        'ourMissionEn',
        'locationAr',
        'locationEn'
    ];
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
