@extends('layouts.app')

@section('content')
<div class="container">
  <h2>製品一覧</h2>

  {{-- 新規登録ページへのリンク --}}
  <div style="margin-bottom:15px;">
    <a href="{{ route('products.create') }}">＋ 新規製品登録</a>
  </div>

  {{-- 一覧表 --}}
  <table border="1" cellpadding="8" cellspacing="0" style="width:100%; border-collapse: collapse;">
    <thead style="background:#f0f0f0;">
      <tr>
        <th>ID</th>
        <th>製品名</th>
        <th>価格</th>
        <th>画像</th>
        <th>説明</th>
        <th>登録日時</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($products as $product)
      <tr>
        <td>{{ $product->id }}</td>
        <td>{{ $product->name }}</td>
        <td>{{ number_format($product->price) }} 円</td>
        <td>
          @if($product->image)
          <img src="{{ asset('storage/' . $product->image) }}"
            alt="製品画像" style="max-width:100px;">
          @else
          なし
          @endif
        </td>
        <td>{{ $product->description }}</td>
        <td>{{ $product->created_at->format('Y-m-d H:i') }}</td>
      </tr>
      @empty
      <tr>
        <td colspan="6" style="text-align:center;">登録された製品はありません。</td>
      </tr>
      @endforelse
    </tbody>
  </table>

  {{-- ページネーション --}}
  <div style="margin-top:15px;">
    {{ $products->links() }}
  </div>
</div>
@endsection