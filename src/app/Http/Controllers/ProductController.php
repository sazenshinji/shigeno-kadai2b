<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function products()
    {
        return view('products');
    }

    // 登録画面を表示
    public function create()
    {
        return view('products.create');
    }

    // 登録処理
    public function store(Request $request)
    {
        // バリデーション
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'price'       => 'required|integer|min:0',
            'image'       => 'required|image|mimes:png,jpg,jpeg|max:2048',
            'description' => 'nullable|string|max:1000',
        ]);

        // 画像を保存（storage/app/public/products に保存）
        $path = $request->file('image')->store('products', 'public');

        // データベースに保存
        Product::create([
            'name'        => $validated['name'],
            'price'       => $validated['price'],
            'image'       => $path,
            'description' => $validated['description'] ?? '',
        ]);
        return redirect()->route('products.create')->with('success', '製品を登録しました！');
    }

    // 一覧表示
    public function index()
    {
        $products = Product::latest()->paginate(10); // ページネーション付き
        return view('products.index', compact('products'));
    }
}
