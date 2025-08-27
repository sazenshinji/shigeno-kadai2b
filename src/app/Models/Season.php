<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    // 1対多（Season -> Product）
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
