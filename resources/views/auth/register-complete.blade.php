@extends('layouts.app')

@section('content')
<div class="container">
    <div class="alert alert-success">
        <h4>登録完了</h4>
        <p>{{ $userName }}さん、アカウントの登録が完了しました！</p>
        <a href="{{ route('login') }}" class="btn btn-primary">ログイン画面へ</a>
    </div>
</div>
@endsection
