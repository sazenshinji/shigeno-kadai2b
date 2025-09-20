<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\SpProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, $id)
    {
        $request->validate([
            'comment' => 'required|string|max:1000',
        ]);

        Comment::create([
            'user_id' => Auth::id(),
            'sp_product_id' => $id,
            'comment' => $request->comment,
            'date' => now(),
        ]);

        return redirect()->route('products.sp.show', $id)->with('success', 'コメントを投稿しました。');
    }
}
