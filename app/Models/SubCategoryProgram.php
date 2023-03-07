<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategoryProgram extends Model
{
    use HasFactory;
    protected $fillable = [
        'subCategoryAr',
        'subCategoryEn',
        'desctriptionAr',
        'desctriptionEn',
        'category_program_id',
        'image',
    ];
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
    public function program()
    {
        return $this->hasMany(Program::class);
    }
    public function catagoryProgram()
    {
        return $this->belongsTo(CategoryProgram::class, "category_program_id", "id");
    }
}