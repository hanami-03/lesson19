@extends('layouts.app')

@section('content')
<div class="container">
    <h1>プロフィール編集</h1>
    <form method="POST" action="{{ route('profiles.update', $user->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">ユーザー名</label>
            <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
        </div>

        <div class="form-group">
            <label for="icon">アイコン</label>
            <input type="file" name="icon" class="form-control">
        </div>

        <div class="form-group">
            <label for="bio">自己紹介</label>
            <textarea name="bio" class="form-control">{{ $user->bio }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">保存</button>
    </form>
</div>
@endsection
