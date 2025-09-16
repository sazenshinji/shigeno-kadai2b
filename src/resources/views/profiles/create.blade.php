@extends('layouts.app_login')

@section('content')
<div class="container">
  <h2>プロファイル入力</h2>

  <form method="POST" action="{{ route('profile.store') }}">
    @csrf

    <div class="mb-3">
      <label>性別</label><br>
      <input type="radio" name="gender" value="男性"> 男性
      <input type="radio" name="gender" value="女性"> 女性
      <input type="radio" name="gender" value="その他"> その他
    </div>

    <div class="mb-3">
      <label>誕生日</label><br>
      <input type="date" name="birthday" required>
    </div>

    <button type="submit" class="btn btn-primary">登録</button>
  </form>
</div>
@endsection