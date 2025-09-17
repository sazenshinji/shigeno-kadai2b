<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\SpProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;

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

/* 一般商品一覧画面 */
Route::get('/products', [ProductController::class, 'index'])->name('products.index');

/* 特別商品一覧（要認証） */
Route::middleware(['auth'])->group(function () {
    Route::get('/products/sp', [SpProductController::class, 'index'])->name('products.sp.index');
});

/* 特別商品詳細 */
Route::get('/products/sp/{product}', [SpProductController::class, 'spShow'])->name('products.sp.show');

Route::middleware(['auth'])->group(function () {
    Route::post('/products/sp/{id}/comment', [CommentController::class, 'store'])->name('products.sp.comment.store');
});

/* ユーザープロファイル */
Route::middleware(['auth'])->group(function () {
    Route::get('/profile/create', [ProfileController::class, 'create'])->name('profile.create');
    Route::post('/profile', [ProfileController::class, 'store'])->name('profile.store');
});

/* 商品登録画面 */
Route::get('/products/register', [ProductController::class, 'register'])->name('products.register');
Route::post('/products/register', [ProductController::class, 'store'])->name('products.store');

// 詳細（編集画面）
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

// 更新
Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');

// 削除
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

Route::get('/register', [RegisterController::class, 'show'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
