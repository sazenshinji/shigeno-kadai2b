<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

<<<<<<< HEAD
    // 多対多（Season -> Product）
=======
    // 多対多リレーション
>>>>>>> 676655f (2025.09.08 08.25 Update)
    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_season');
    }

}
