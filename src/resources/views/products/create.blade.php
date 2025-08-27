@extends('layouts.app')

@section('content')
<div class="container">
  <h2>製品登録</h2>

  @if(session('success'))
  <div style="color:green;">{{ session('success') }}</div>
  @endif

  @if($errors->any())
  <div style="color:red;">
    <ul>
      @foreach($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif

  <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div>
      <label for="name">製品名</label><br>
      <input type="text" name="name" value="{{ old('name') }}">
    </div>

    <div>
      <label for="price">価格</label><br>
      <input type="number" name="price" value="{{ old('price') }}">
    </div>

    <div>
      <label>季節</label><br>
      @foreach($seasons as $season)
      <label style="margin-right:10px;">
        <input type="radio" name="season_id" value="{{ $season->id }}"
          {{ old('season_id') == $season->id ? 'checked' : '' }}>
        {{ $season->name }}
      </label>
      @endforeach
    </div>

    <div>
      <label for="image">製品画像</label><br>
      <input type="file" name="image" id="image" accept="image/*" onchange="previewImage(event)">
      <br>
      <img id="preview" src="#" style="max-width:200px; display:none; margin-top:10px;">
    </div>

    <div>
      <label for="description">説明</label><br>
      <textarea name="description" rows="5">{{ old('description') }}</textarea>
    </div>

    <div style="margin-top:15px;">
      <button type="submit">登録</button>
    </div>
  </form>
</div>

<script>
  function previewImage(event) {
    const reader = new FileReader();
    reader.onload = function(e) {
      const preview = document.getElementById('preview');
      preview.src = e.target.result;
      preview.style.display = 'block';
    };
    reader.readAsDataURL(event.target.files[0]);
  }
</script>
@endsection