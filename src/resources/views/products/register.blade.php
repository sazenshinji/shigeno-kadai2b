@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/create.css') }}" />
@endsection

@section('content')
<div class="form-container">
  <h1>商品登録</h1>

  <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <!-- 商品名 -->
    <div class="form-group">
      <label for="name">商品名</label> <span class="create-form__required">必須</span>
      <input type="text" name="name" id="name" class="form-control" placeholder="商品名を入力" value="{{ old('name') }}">
      <div class="create-form__error-message">
        @error('name')
        {{ $message }}
        @enderror
      </div>
    </div>

    <!-- 価格 -->
    <div class="form-group">
      <label for="price">値段</label> <span class="create-form__required">必須</span>
      <input type="number" name="price" id="price" class="form-control" placeholder="値段を入力" value="{{ old('price') }}">
      <div class="create-form__error-message">
        @error('price')
        {{ $message }}
        @enderror
      </div>
    </div>

    <!-- 季節 -->
    <div class="form-group">
      <label>季節</label> <span class="create-form__required">必須</span><br>
      @foreach($seasons as $season)
      <label>
        <input type="checkbox" name="seasons[]" value="{{ $season->id }}"
          {{ in_array($season->id, old('seasons', [])) ? 'checked' : '' }}>
        {{ $season->name }}
      </label>
      @endforeach
      <div class="create-form__error-message">
        @error('seasons')
        {{ $message }}
        @enderror
      </div>
    </div>

    <!-- 商品説明 -->
    <div class="form-group">
      <label for="description">商品説明</label> <span class="create-form__required">必須</span>
      <textarea name="description" id="description" class="form-control" rows="4" placeholder="商品の説明を入力">{{ old('description') }}</textarea>
      <div class="create-form__error-message">
        @error('description')
        {{ $message }}
        @enderror
      </div>
    </div>

    <!-- 商品画像 -->
    <div class="form-group">
      <label for="image">商品画像</label> <span class="create-form__required">必須</span>
      <input type="file" name="image" id="image" class="form-control-file" accept="image/*" onchange="previewImage(event)">
      <div class="form-group-2">
        <img id="preview" src="#" alt="プレビュー画像" style="max-width:200px; display:none;">
      </div>
      <div class="create-form__error-message">
        @error('image')
        {{ $message }}
        @enderror
      </div>
    </div>

    <a href="{{ route('products.index') }}" class="btn-back">戻る</a>
    <button type="submit" class="btn-submit">登録</button>

  </form>
</div>

<!-- Loading script for image confirmation -->
<script src="{{ asset('js/create_img_script.js') }}"></script>

@endsection