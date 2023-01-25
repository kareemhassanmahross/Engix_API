<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $fillable = ['image', 'nameEn', 'nameAr', 'titleAr', 'titleEn'];
    protected $hidden = ["created_at", "updated_at"];
    public function hiring()
    {
        return $this->hasMany(Hiring::class);
    }
}