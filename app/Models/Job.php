<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $fillable = [
        'nameAr',
        'nameEn',
        'locationAr',
        'locationEn',
        'image',
        'requirmentEn',
        'requirmentAr',
        'descriptionEn',
        'descriptionAr',
        'whatYouWillDo',
    ];
    protected $hidden = ["created_at", "updated_at"];
    public function hiring()
    {
        return $this->hasMany(Hiring::class);
    }
}