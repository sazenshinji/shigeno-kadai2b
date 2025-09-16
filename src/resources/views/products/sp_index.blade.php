@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}" />
@endsection

@section('content')
<div class="container">
  <h1>商品一覧（特価品）</h1>

  <!-- ログアウトボタン -->
  <form method="POST" action="{{ route('logout') }}">
  @csrf
  <button type="submit" class="btn btn-danger">
  ログアウト
  </button>
  </form>

  <!-- <form method="POST" action="{{ url('/logout') }}">
    @csrf
    <button type="submit" class="btn btn-danger">ログアウト</button>
  </form> -->


  <div class="row">
    @foreach($products as $product)
    <div class="col-md-4 mb-3">
      <div class="card shadow-sm">
        <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
        <div class="card-body">
          <h5>{{ $product->name }}</h5>
          <p>価格: ¥{{ number_format($product->price) }}</p>
          <p>{{ $product->description }}</p>
          <p>
            季節:
            @foreach($product->seasons as $season)
            <span class="badge bg-info">{{ $season->name }}</span>
            @endforeach
          </p>
        </div>
      </div>
    </div>
    @endforeach
  </div>

  {{ $products->links() }}
</div>
@endsection