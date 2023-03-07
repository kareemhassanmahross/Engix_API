<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meduol extends Model
{
    use HasFactory;
    protected $fillable = [
        'nameAr',
        'nameEn',
        'program_id',
    ];
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
    public function program()
    {
        return $this->belongsTo(Program::class, "program_id", "id");
    }
}