@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/show.css') }}" />
@endsection

@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">

      <!-- 商品詳細 -->
      <div class="card shadow-sm mb-4">
        <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
        <div class="card-body">
          <h3>{{ $product->name }}</h3>

          <div class="d-flex gap-3 mb-2">
            <p class="mb-0">価格: ¥{{ number_format($product->price) }}</p>
            <p class="mb-0">
              季節:
              @foreach($product->seasons as $season)
              <span class="badge bg-info">{{ $season->name }}</span>
              @endforeach
            </p>
          </div>

          <p>{{ $product->description }}</p>
          <a href="{{ route('products.sp.index') }}" class="btn btn-secondary">戻る</a>
        </div>
      </div>

      <!-- コメント入力フォーム -->
      <div class="card shadow-sm mb-4">
        <div class="card-body">
          <h5>コメントを投稿する</h5>
          <form method="POST" action="{{ route('products.sp.comment.store', $product->id) }}">
            @csrf
            <div class="mb-3">
              <textarea name="comment" class="form-control" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">送信</button>
          </form>
        </div>
      </div>

      <!-- コメント一覧 -->
      <div class="card shadow-sm">
        <div class="card-body">
          <h5>コメント一覧</h5>
          @forelse($product->comments()->orderBy('date','desc')->get() as $comment)
          <div class="d-flex justify-content-start align-items-center border-bottom py-2">
            <small class="text-muted me-3">{{ $comment->date }}</small>
            <small class="text-muted me-3">{{ $comment->user->name }}</small>
            <span>{{ $comment->comment }}</span>
          </div>
          @empty
          <p>コメントはまだありません。</p>
          @endforelse
        </div>
      </div>

    </div>
  </div>
</div>

@endsection