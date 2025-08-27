<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Season;

class ProductController extends Controller
{
    public function products()
    {
        return view('products');
    }

    // 登録画面
    public function create()
    {
        $seasons = Season::all(); // セレクトボックス用
        return view('products.create', compact('seasons'));
    }

    // 登録処理
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'price'       => 'required|integer|min:0',
            'image'       => 'required|image|mimes:png,jpg,jpeg|max:2048',
            'description' => 'nullable|string|max:1000',
            'season_id'   => 'required|exists:seasons,id',
        ]);

        // 画像保存
        $path = $request->file('image')->store('products', 'public');

        Product::create([
            'name'        => $validated['name'],
            'price'       => $validated['price'],
            'image'       => $path,
            'description' => $validated['description'] ?? '',
            'season_id'   => $validated['season_id'],
        ]);

        return redirect()->route('products.create')->with('success', '製品を登録しました！');
    }

    // 一覧表示
    public function index()
    {
        $products = Product::latest()->paginate(6); // ページネーション付き
        return view('products.index', compact('products'));
    }
}
