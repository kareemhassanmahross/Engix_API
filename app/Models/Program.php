<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
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
        'sub_category_programs_id',
        'Meduol'
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
        return $this->belongsTo(SubCategoryProgram::class, "sub_category_programs_id", "id");
    }
    protected function Meduol(): Attribute

    {
        return Attribute::make(
            get: fn ($Meduol) => json_decode($Meduol, true),
            set: fn ($Meduol) => json_encode($Meduol),
        );
    }
}
