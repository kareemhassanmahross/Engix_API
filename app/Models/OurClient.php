<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurClient extends Model
{
    use HasFactory;
    protected $fillable = ['image', 'nameEn', 'nameAr'];
    protected $hidden = ["created_at", "updated_at"];
}