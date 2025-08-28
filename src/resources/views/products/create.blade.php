@extends('layouts.app')

@section('content')
<div class="container">
  <h1>商品登録</h1>

  @if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach
    </ul>
  </div>
  @endif

  <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
      <label>商品名</label>
      <input type="text" name="name" class="form-control" value="{{ old('name') }}">
    </div>

    <div class="mb-3">
      <label>価格</label>
      <input type="number" name="price" class="form-control" value="{{ old('price') }}">
    </div>

    <div class="mb-3">
      <label>季節</label><br>
      @foreach ($seasons as $season)
      <input type="radio" name="season_id" value="{{ $season->id }}"
        {{ old('season_id') == $season->id ? 'checked' : '' }}>
      {{ $season->name }}
      @endforeach
    </div>

    <div class="mb-3">
      <label>商品説明</label>
      <textarea name="description" class="form-control">{{ old('description') }}</textarea>
    </div>

    <div class="mb-3">
      <label>商品画像</label>
      <input type="file" name="image" class="form-control" accept="image/*" onchange="previewImage(event)">
      <div class="mt-2">
        <img id="preview" src="#" alt="プレビュー画像" style="max-width:200px; display:none;">
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