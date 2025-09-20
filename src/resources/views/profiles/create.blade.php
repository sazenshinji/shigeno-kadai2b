@extends('layouts.app_login')

@section('css')
<link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endsection

@section('content')
<div class="login-form__content">
  <div class="login-form__heading">
    <h2>プロファイル入力</h2>
  </div>

  <form class="form" method="POST" action="{{ route('profile.store') }}">
    @csrf

    <div class="form__group">
      <div class="form__group-title">
        <label>性別</label><br>
      </div>
      <div class="form__group-content">
        <input type="radio" name="gender" value="男性"> 男性
        <input type="radio" name="gender" value="女性"> 女性
        <input type="radio" name="gender" value="その他"> その他
      </div>
    </div>

    <div class="form__group">
      <div class="form__group-title">
        <label>誕生日</label><br>
      </div>
      <div class="form__group-content">
        <input type="date" name="birthday" required>
      </div>
    </div>

    <div class="form__button">
      <button class="form__button-submit" type="submit">登録</button>
    </div>

  </form>
</div>
@endsection