<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'image',
        'season_id',
        'description',
    ];

    // 多対1（Product -> Season）
    public function season()
    {
        return $this->belongsTo(Season::class);
    }
}
