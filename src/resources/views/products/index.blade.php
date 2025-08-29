@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}" />
@endsection

@section('content')
<div class="container">
  <h1>商品一覧</h1>

  {{-- 商品名検索フォーム --}}
  <div class="mb-3">
    <form action="{{ route('products.index') }}" method="GET" class="d-flex" style="gap: 10px;">
      <input type="text" name="keyword" class="form-control"
        placeholder="商品名で検索"
        value="{{ old('keyword', $keyword) }}">
      <button type="submit" class="btn btn-primary">検索</button>
    </form>
  </div>

  {{-- 価格順ソート --}}
  <div class="mb-3">
    <p>価格順で表示</p>
    <form action="{{ route('products.index') }}" method="GET">
      {{-- 検索キーワードを維持 --}}
      <input type="hidden" name="keyword" value="{{ $keyword }}">
      <select name="sort" class="form-select" onchange="this.form.submit()">
        <option value="" disabled {{ !$sort ? 'selected' : '' }}>価格で並べ替え</option>
        <option value="high" {{ $sort === 'high' ? 'selected' : '' }}>高い順に表示</option>
        <option value="low" {{ $sort === 'low' ? 'selected' : '' }}>低い順に表示</option>
      </select>
    </form>

    {{-- 現在のソートラベル --}}
    @if ($sort === 'high')
    <div class="mt-2">
      <span class="badge bg-primary">高い順に表示
        <a href="{{ route('products.index', ['keyword' => $keyword]) }}" class="text-white ms-1">×</a>
      </span>
    </div>
    @elseif ($sort === 'low')
    <div class="mt-2">
      <span class="badge bg-primary">低い順に表示
        <a href="{{ route('products.index', ['keyword' => $keyword]) }}" class="text-white ms-1">×</a>
      </span>
    </div>
    @endif
  </div>

  <a href="{{ route('products.create') }}" class="btn btn-success mb-3">＋ 商品を追加</a>

  @if (session('success'))
  <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  <div class="product-grid">
    @forelse ($products as $product)
    <a href="{{ route('products.show', $product) }}" class="product-card-link">
      <div class="product-card">
        <div class="product-image">
          @if ($product->image)
          <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
          @else
          <img src="https://via.placeholder.com/200" alt="no image">
          @endif
        </div>
        <div class="product-info">
          <h5>{{ $product->name }}</h5>
          <p class="price">¥{{ number_format($product->price) }}</p>
        </div>
      </div>
    </a>
    @empty
    <p>商品が見つかりませんでした。</p>
    @endforelse
  </div>

  <div class="mt-3">
    {{-- ページネーション時も検索・ソート条件を保持 --}}
    {{ $products->appends(['keyword' => $keyword, 'sort' => $sort])->links() }}
  </div>
</div>
@endsection