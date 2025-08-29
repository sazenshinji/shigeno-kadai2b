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
      <label for="name">商品名</label>
      <input type="text" name="name" id="name" class="form-control" placeholder="商品名を入力" value="{{ old('name') }}">
      <div class="create-form__error-message">
        @error('name')
        {{ $message }}
        @enderror
      </div>
    </div>

    <!-- 価格 -->
    <div class="form-group">
      <label for="price">価格</label>
      <input type="number" name="price" id="price" class="form-control" placeholder="値段を入力" value="{{ old('price') }}">
      <div class="create-form__error-message">
        @error('price')
        {{ $message }}
        @enderror
      </div>
    </div>

    <!-- 季節 -->
    <div class="form-group">
      <label>季節</label><br>
      @foreach ($seasons as $season)
      <label>
        <input type="radio" name="season_id" value="{{ $season->id }}"
          {{ old('season_id') == $season->id ? 'checked' : '' }}>
        {{ $season->name }}
      </label>
      @endforeach
      <div class="create-form__error-message">
        @error('season_id')
        {{ $message }}
        @enderror
      </div>
    </div>

    <!-- 商品説明 -->
    <div class="form-group">
      <label for="description">商品説明</label>
      <textarea name="description" id="description" class="form-control" rows="4" placeholder="商品の説明を入力">{{ old('description') }}</textarea>
      <div class="create-form__error-message">
        @error('description')
        {{ $message }}
        @enderror
      </div>
    </div>

    <!-- 商品画像 -->
    <div class="form-group">
      <label for="image">商品画像</label>
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

<script>
  function previewImage(event) {
    let reader = new FileReader();
    reader.onload = function() {
      let output = document.getElementById('preview');
      output.src = reader.result;
      output.style.display = 'block';
    };
    reader.readAsDataURL(event.target.files[0]);
  }
</script>
@endsection