<?php

namespace App\Http\Controllers;

use App\Models\SpProduct;
use Illuminate\Http\Request;

class SpProductController extends Controller
{
    // 特別商品一覧
    public function index()
    {
        // eager loading seasons を利用
        $products = SpProduct::with('seasons')->paginate(6);

        return view('products.sp_index', compact('products'));
    }
}

