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
        'description',
    ];

<<<<<<< HEAD
    // 多対多（Product -> Season）
=======
    // 多対多リレーション
>>>>>>> 676655f (2025.09.08 08.25 Update)
    public function seasons()
    {
        return $this->belongsToMany(Season::class, 'product_season');
    }

}
