@extends('layouts.app')

@section('content')
<div class="container">
  <h2>製品登録</h2>

  {{-- 成功メッセージ --}}
  @if(session('success'))
  <div style="color: green;">
    {{ session('success') }}
  </div>
  @endif

  {{-- バリデーションエラー表示 --}}
  @if($errors->any())
  <div style="color: red;">
    <ul>
      @foreach($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif

  {{-- 登録フォーム --}}
  <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div>
      <label for="name">製品名</label><br>
      <input type="text" name="name" id="name" value="{{ old('name') }}">
    </div>

    <div>
      <label for="price">価格</label><br>
      <input type="number" name="price" id="price" value="{{ old('price') }}">
    </div>

    <div>
      <label for="image">製品画像</label><br>
      <input type="file" name="image" id="image" accept="image/*" onchange="previewImage(event)">
      <br>
      <img id="preview" src="#" alt="プレビュー画像" style="max-width:200px; display:none; margin-top:10px;">
    </div>

    <div>
      <label for="description">製品説明</label><br>
      <textarea name="description" id="description" rows="5">{{ old('description') }}</textarea>
    </div>

    <div style="margin-top:15px;">
      <button type="submit">登録</button>
    </div>
  </form>
</div>

{{-- JavaScriptでプレビュー --}}
<script>
  function previewImage(event) {
    const input = event.target;
    const reader = new FileReader();

    reader.onload = function() {
      const preview = document.getElementById('preview');
      preview.src = reader.result;
      preview.style.display = 'block';
    };

    if (input.files[0]) {
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>
@endsection