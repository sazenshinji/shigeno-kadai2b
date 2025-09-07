<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Season;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreRequest;
use App\Http\Requests\UpdateRequest;

class ProductController extends Controller
{
    // 一覧表示
    public function index(Request $request)
    {
        $query = Product::with('seasons');

        // 商品名検索（部分一致）
        if ($request->filled('keyword')) {
            $keyword = $request->input('keyword');
            $query->where('name', 'like', "%{$keyword}%");
        }

        // 価格順ソート
        $sort = $request->input('sort');
        if ($sort === 'high') {
            $query->orderBy('price', 'desc');
        } elseif ($sort === 'low') {
            $query->orderBy('price', 'asc');
        }

        $products = $query->paginate(6);

        return view('products.index', [
            'products' => $products,
            'keyword'  => $request->input('keyword'),
            'sort'     => $sort,
        ]);
    }


    // 登録画面表示
    public function register()
    {
        $seasons = Season::all(); // 春夏秋冬を取得
        return view('products.register', compact('seasons'));
    }

    // 商品登録処理
    public function store(StoreRequest $request)
    {

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
        }

        $product = Product::create([
            'name'        => $request->name,
            'price'       => $request->price,
            'description' => $request->description,
            'image'       => $imagePath,
        ]);

        // 季節の中間テーブルに保存
        $product->seasons()->attach($request->seasons);

        return redirect()->route('products.index')->with('success', '商品を登録しました');
    }

    // 商品詳細（編集画面）
    public function show(Product $product)
    {
        $seasons = Season::all();
        return view('products.show', compact('product', 'seasons'));
    }

    // 商品更新処理
    public function update(UpdateRequest $request, Product $product)
    {

        // 新しい画像があれば更新
        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image); // 古い画像を削除
            }
            $product->image = $request->file('image')->store('products', 'public');
        }

        $product->update([
            'name'        => $request->name,
            'price'       => $request->price,
            'description' => $request->description,
            'image'       => $product->image,
        ]);

        // 季節の中間テーブルを更新
        $product->seasons()->sync($request->seasons);

        return redirect()->route('products.index')->with('success', '商品情報を更新しました');
    }

    // 商品削除処理
    public function destroy(Product $product)
    {
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }
        $product->delete();

        return redirect()->route('products.index')->with('success', '商品を削除しました');
    }
}
