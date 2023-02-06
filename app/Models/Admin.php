<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;

class Admin extends  Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $guard = 'admin';
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

    public function hasAbility($perr)
    {
        $per = (array)$perr;
        $isAdmins =  json_decode(Auth::user()->isAdmin);
        foreach ($isAdmins as $isAdmin) {
            if (is_array($per) && in_array($isAdmin, $per)) {
                return true;
            }
            return false;
        }
    }
}