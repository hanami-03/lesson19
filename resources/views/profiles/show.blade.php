@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $user->name }}のプロフィール</h1>

    <!-- アイコンの表示 -->
    <div class="profile-icon">
        <img src="{{ $user->icon_url }}" alt="{{ $user->name }}のアイコン" class="rounded-circle" style="width: 100px; height: 100px;">
        @if(auth()->check() && auth()->user()->id === $user->id)
            <a href="{{ route('profiles.edit', $user->id) }}" class="btn btn-secondary">プロフィールの編集</a>
        @endif
    </div>

    <p>自己紹介: {{ $user->bio ?? '自己紹介が設定されていません。' }}</p>
    <p>メールアドレス: {{ $user->email }}</p>

    <div class="row">
        <!-- フォロー一覧ボタン -->
        <div class="col-md-6">
            <a href="{{ route('follow.follows', $user->id) }}" class="btn btn-info">フォロー一覧 ({{ $user->follows->count() }}人)</a>
        </div>

        <!-- フォロワー一覧ボタン -->
        <div class="col-md-6">
            <a href="{{ route('follow.followers', $user->id) }}" class="btn btn-info">フォロワー一覧 ({{ $user->followers->count() }}人)</a>
        </div>
    </div>

    <div class="profiles-posts">
      <h2>投稿一覧</h2>
      <ul class="list-group">
          @foreach($posts as $post)
              <li class="list-group-item">
                  <strong>投稿内容:</strong> {{ $post->contents }}<br>
                  <strong>投稿日時:</strong> {{ $post->created_at->format('Y-m-d H:i:s') }}<br>
                  <strong>変更日時:</strong> {{ $post->updated_at->format('Y-m-d H:i:s') }}<br>

                  @if(auth()->check() && auth()->user()->name === $post->user_name)
                      <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">更新</a>
                      <form method="POST" action="{{ route('posts.destroy', $post->id) }}" style="display: inline;" onsubmit="return confirm('本当に削除しますか？');">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger">削除</button>
                      </form>
                  @endif
              </li>
          @endforeach
      </ul>
    </div>

</div>
@endsection
