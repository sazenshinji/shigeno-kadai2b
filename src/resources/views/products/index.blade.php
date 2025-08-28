@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}" />
@endsection

@section('content')
<div class="container">
  <h1>商品一覧</h1>

  <div class="mb-3">
    <form action="{{ route('products.index') }}" method="GET" class="d-flex" style="gap: 10px;">
      <input type="text" name="keyword" class="form-control"
        placeholder="商品名で検索"
        value="{{ old('keyword', $keyword) }}">
      <button type="submit" class="btn btn-primary">検索</button>
    </form>
  </div>

  <a href="{{ route('products.create') }}" class="btn btn-success mb-3">商品を追加</a>

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
    {{ $products->appends(['keyword' => $keyword])->links() }}
  </div>
</div>
@endsection
