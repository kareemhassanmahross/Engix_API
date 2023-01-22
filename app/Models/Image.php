<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $fillable = ['image', 'product_id'];
    protected $hidden = ["created_at", "updated_at"];
    public function user()
    {
        return $this->belongsTo(User::class, "product_id", "id");
    }
}