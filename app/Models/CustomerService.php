<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerService extends Model
{
    use HasFactory;
    protected $fillable = [
        'phone'
    ];
    protected $hidden = ['created_at', 'updated_at'];
    protected function phone(): Attribute
    {
        return Attribute::make(
            get: fn ($phone) => json_decode($phone, true),
            set: fn ($phone) => json_encode($phone),
        );
    }
}
