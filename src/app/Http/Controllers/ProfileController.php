<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function create()
    {
        return view('profiles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'gender'   => 'required|string',
            'birthday' => 'required|date',
        ]);

        $user = Auth::user();

        // すでにプロフィールが存在する場合は更新
        $user->profile()->updateOrCreate(
            ['user_id' => $user->id],
            [
                'gender'   => $request->gender,
                'birthday' => $request->birthday,
            ]
        );

        // ✅ プロファイル登録後に商品一覧特別画面へ
        // return redirect()->route('products.sp.index')
        // ->with('success', 'プロフィールを登録しました');
        return redirect()->intended(route('products.index'));
    }
}
