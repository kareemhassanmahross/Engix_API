<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;
    protected $fillable = [
        'descriptionAr',
        'descriptionEn',
        'image',
        'youtupe',
        'test',
        'nameProgramAr',
        'nameProgramEn',
        'userName',
        'password',
        'sub_category_program_id'
    ];
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
    public function medoul()
    {
        return $this->hasMany(Meduol::class);
    }
    public function subcatagoryprogram()
    {
        return $this->belongsTo(SubCategoryProgram::class, "sub_category_program_id", "id");
    }
}