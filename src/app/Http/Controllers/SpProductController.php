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
        $user = auth()->user();
        return view('products.sp_index', compact('products', 'user'));
    }
    // 特別商品詳細
    public function spShow(SpProduct $product)
    {
        $product->load('seasons'); // 季節情報をロード
        return view('products.sp_show', compact('product'));
    }
}

