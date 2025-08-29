@extends('layouts.app')

@section('content')
<div class="container">
  <h1>商品登録</h1>

  <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
      <label for="name">商品名</label>
      <input type="text" name="name" id="name" class="form-control" placeholder="商品名を入力" value="{{ old('name') }}">
      <div class="create-form__error-message">
        @error('name')
        {{ $message }}
        @enderror
      </div>
    </div>
</div>

<div class="mb-3">
  <label for="price">価格</label>
  <input type="number" name="price" id="price" class="form-control" placeholder="値段を入力" value="{{ old('price') }}">
  <div class="create-form__error-message">
    @error('price')
    {{ $message }}
    @enderror
  </div>
</div>

<div class="mb-3">
  <label>季節</label><br>
  @foreach ($seasons as $season)
  <input type="radio" name="season_id" value="{{ $season->id }}"
    {{ old('season_id') == $season->id ? 'checked' : '' }}>
  {{ $season->name }}
  @endforeach
  <div class="create-form__error-message">
    @error('season_id')
    {{ $message }}
    @enderror
  </div>
</div>

<div class="mb-3">
  <label for="description">商品説明</label>
  <textarea name="description" id="description" class="form-control" placeholder="商品の説明を入力">{{ old('description') }}</textarea>
  <div class="create-form__error-message">
    @error('description')
    {{ $message }}
    @enderror
  </div>
</div>

<div class="mb-3">
  <label>商品画像</label>
  <input type="file" name="image" class="form-control" accept="image/*" onchange="previewImage(event)">
  <div class="mt-2">
    <img id="preview" src="#" alt="プレビュー画像" style="max-width:200px; display:none;">
  </div>
  <div class="create-form__error-message">
    @error('image')
    {{ $message }}
    @enderror
  </div>
</div>

<button type="submit" class="btn btn-primary">登録</button>
<a href="{{ route('products.index') }}" class="btn btn-secondary">戻る</a>
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