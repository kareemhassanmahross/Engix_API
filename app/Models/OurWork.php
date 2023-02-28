<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurWork extends Model
{
    use HasFactory;
    protected $fillable = [
        'nameAr',
        'nameEn',
        'image',
        'category_our_work_id',
    ];
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
    public function categoryOurWork()
    {
        return $this->belongsTo(categoryOurWork::class, "category_our_work_id", "id");
    }
}