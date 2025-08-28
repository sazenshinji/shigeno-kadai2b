@extends('layouts.app')

@section('content')
<div class="container">
  <h1>商品詳細</h1>

  <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
      <label>商品画像</label><br>
      @if ($product->image)
      <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" style="max-width:200px;">
      @else
      <img src="https://via.placeholder.com/200" alt="no image" style="max-width:200px;">
      @endif
      <input type="file" name="image" class="form-control mt-2" accept="image/*">
    </div>

    <div class="mb-3">
      <label>商品名</label>
      <input type="text" name="name" class="form-control" value="{{ old('name', $product->name) }}">
    </div>

    <div class="mb-3">
      <label>価格</label>
      <input type="number" name="price" class="form-control" value="{{ old('price', $product->price) }}">
    </div>

    <div class="mb-3">
      <label>季節</label><br>
      @foreach ($seasons as $season)
      <input type="radio" name="season_id" value="{{ $season->id }}"
        {{ $product->season_id == $season->id ? 'checked' : '' }}>
      {{ $season->name }}
      @endforeach
    </div>

    <div class="mb-3">
      <label>商品説明</label>
      <textarea name="description" class="form-control">{{ old('description', $product->description) }}</textarea>
    </div>

    <a href="{{ route('products.index') }}" class="btn btn-secondary">戻る</a>
    <button type="submit" class="btn btn-primary">変更を保存</button>
  </form>

  <form action="{{ route('products.destroy', $product) }}" method="POST" style="margin-top:15px;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger" onclick="return confirm('本当に削除しますか？')">削除</button>
  </form>
</div>
@endsection