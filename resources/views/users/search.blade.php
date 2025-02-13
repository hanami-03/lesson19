@extends('layouts.app')

@section('content')
<div class="container">
    <h2>ユーザー検索</h2>
    <form method="GET" action="{{ route('users.search') }}">
        <div class="form-group">
            <input type="text" name="query" class="form-control" placeholder="ユーザー名を入力">
        </div>
        <button type="submit" class="btn btn-primary">検索</button>
    </form>
    <div id="search-results">
        @if(isset($users) && $users->count() > 0)
            <h3>検索結果:</h3>
            <ul class="list-group">
                @foreach($users as $user)
                    <li class="list-group-item">
                        <a href="{{ route('profiles.show', $user->id) }}">{{ $user->name }}</a>
                    </li>
                @endforeach
            </ul>
        @else
            <p>ユーザーが見つかりませんでした。</p>
        @endif
    </div>
</div>
@endsection
