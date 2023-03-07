<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryProgram extends Model
{
    use HasFactory;
    protected $fillable = [
        'categoryNameAr',
        'categoryNameEn',
        'desctriptionAr',
        'desctriptionEn',
        'image',
    ];
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
    public function SubCategoryProgram()
    {
        return $this->hasMany(SubCategoryProgram::class);
    }
}
