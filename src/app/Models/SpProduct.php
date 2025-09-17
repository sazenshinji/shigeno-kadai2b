<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpProduct extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'description', 'image'];

    public function seasons()
    {
        return $this->belongsToMany(Season::class, 'sp_product_season');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
