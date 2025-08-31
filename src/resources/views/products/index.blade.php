@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}" />
@endsection

@section('content')
<div class="product-list-container">

  <!-- ヘッダー -->
  <div class="list-header">
    <h1 class="title">
      @if (!empty($keyword))
      ”{{ $keyword }}” の商品一覧
      @else
      商品一覧
      @endif
    </h1>
    <a href="{{ route('products.register') }}" class="btn-add">＋商品を追加</a>
  </div>

  <div class="content-wrapper">
    <!-- 左サイドバー -->
    <div class="sidebar">
      <!-- 検索フォーム -->
      <form action="{{ route('products.index') }}" method="GET" class="search-form">
        <input type="text" name="keyword" placeholder="商品名で検索" value="{{ old('keyword', $keyword) }}">
        <button type="submit">検索</button>
      </form>

      <!-- 並べ替え -->
      <div class="sort-section">
        <p>価格順で表示</p>
        <form action="{{ route('products.index') }}" method="GET">
          {{-- 検索キーワードを維持 --}}
          <input type="hidden" name="keyword" value="{{ $keyword }}">
          <select name="sort" onchange="this.form.submit()">
            <option value="" disabled {{ !$sort ? 'selected' : '' }}>価格で並べ替え</option>
            <option value="high" {{ $sort === 'high' ? 'selected' : '' }}>高い順に表示</option>
            <option value="low" {{ $sort === 'low' ? 'selected' : '' }}>低い順に表示</option>
          </select>
        </form>

        {{-- 現在のソートラベル --}}
        @if ($sort === 'high')
        <span class="badge bg-primary">高い順に表示
          <a href="{{ route('products.index', ['keyword' => $keyword]) }}" class="text-white ms-1">×</a>
        </span>
        @elseif ($sort === 'low')
        <span class="badge bg-primary">低い順に表示
          <a href="{{ route('products.index', ['keyword' => $keyword]) }}" class="text-white ms-1">×</a>
        </span>
        @endif
      </div>
    </div>

    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- メイン商品一覧 -->
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



  </div>

  {{-- ページネーション時も検索・ソート条件を保持 --}}
  <div class="pagination-wrapper">
    {{ $products->appends(['keyword' => $keyword, 'sort' => $sort])->links() }}
  </div>


  @endsection