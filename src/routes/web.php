<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* 商品一覧画面 */
Route::get('/products', [ProductController::class, 'index'])->name('products.index');

/* 商品登録画面 */
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');

// 詳細（編集画面）
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

// 更新
Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');

// 削除
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
