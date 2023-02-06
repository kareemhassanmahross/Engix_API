<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Admin extends  Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $guard = 'admins';
    protected $fillable = [
        'nameAr',
        'nameEn',
        'email',
        'password',
        'isAdmin'
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected function isAdmin(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => json_decode($value, true),
            set: fn ($value) => json_encode($value),
        );
    }
    public function hasAbility($per)
    {
        $isAdmins = Auth::user()->isAdmin;
        if (is_array($isAdmins) && in_array($per, $isAdmins)) {
            return true;
        }
        return false;
    }
}