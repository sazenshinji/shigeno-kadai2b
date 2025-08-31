@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/show.css') }}" />
@endsection

@section('content')
<div class="product-detail-container">

  <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="product-detail-card">
      {{-- 左側：画像エリア --}}
      <div class="product-image-area">
        <label>商品画像</label><br>

        <!-- 商品画像プレビュー -->
        <div class="image-preview">
          @if ($errors->has('image'))
          {{-- バリデーションエラーがあれば画像は表示しない --}}
          <img id="preview" src="" alt="" style="display:none;">
          @else
          {{-- エラーがなければ登録済み画像を表示 --}}
          <img id="preview" src="{{ asset('storage/'.$product->image) }}" alt="商品画像">
          @endif
        </div>
        <!-- ファイル選択 -->
        <input type="file" id="image" name="image" accept="image/*">
        <div class="create-form__error-message">
          @error('image')
          {{ $message }}
          @enderror
        </div>
      </div>

      {{-- 右側：商品情報エリア --}}
      <div class="product-info-area">
        <label for="name">商品名</label>
        <input type="text" name="name" value="{{ old('name', $product->name) }}">
        <div class="create-form__error-message">
          @error('name')
          {{ $message }}
          @enderror
        </div>

        <label for="price">値段</label>
        <input type="number" name="price" value="{{ old('price', $product->price) }}">
        <div class="create-form__error-message">
          @error('price')
          {{ $message }}
          @enderror
        </div>

        <label>季節</label>
        <div class="season-radio">
          @foreach ($seasons as $season)
          <label>
            <input type="radio" name="season_id" value="{{ $season->id }}"
              {{ $product->season_id == $season->id ? 'checked' : '' }}>
            {{ $season->name }}
          </label>
          @endforeach
          <div class="create-form__error-message">
            @error('season_id')
            {{ $message }}
            @enderror
          </div>
        </div>
      </div>
    </div>

    {{-- 商品説明 --}}
    <div class="product-description">
      <label for="description">商品説明</label>
      <textarea name="description" rows="4">{{ old('description', $product->description) }}</textarea>
      <div class="create-form__error-message">
        @error('description')
        {{ $message }}
        @enderror
      </div>
    </div>

    {{-- ボタン --}}
    <div class="button-group">
      <a href="{{ route('products.index') }}" class="btn-back">戻る</a>
      <button type="submit" class="btn-save">変更を保存</button>

  </form>

  <form action="{{ route('products.destroy', $product) }}" method="POST" style="margin-top:15px;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn-delete">
      <img src="{{ asset('images/trash.png') }}" alt="削除" class="icon-trash">
    </button>
  </form>
</div>
</div>

<!-- Loading script for image confirmation -->
<script src="{{ asset('js/update_img_script.js') }}"></script>

@endsection