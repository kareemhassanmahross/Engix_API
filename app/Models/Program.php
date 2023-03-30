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
        'category_program_id',
        'Meduol'
    ];
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
    public function catagoryprogram()
    {
        return $this->belongsTo(CategoryProgram::class, "category_program_id", "id");
    }
    protected function Meduol(): Attribute

    {
        return Attribute::make(
            get: fn ($Meduol) => json_decode($Meduol, true),
            set: fn ($Meduol) => json_encode($Meduol),
        );
    }
}
