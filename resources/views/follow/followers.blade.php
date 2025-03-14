@extends('layouts.app')

@section('content')
<div class="container">
    <h1>フォロワー一覧</h1>
    <table class="table">
        <thead>
            <tr>
                <th>アイコン</th>
                <th>ユーザー名</th>
                <th>フォロー数</th>
                <th>フォロワー数</th>
            </tr>
        </thead>
        <tbody>
            @foreach($followers as $follower)
                <tr>
                    <td><img src="{{ $follower->icon_url }}" alt="{{ $follower->name }}のアイコン" style="width: 50px; height: 50px;" class="rounded-circle"></td>
                    <td><a href="{{ route('profiles.show', $follower->id) }}">{{ $follower->name }}</a></td>
                    <td>{{ $follower->follows->count() }}</td>
                    <td>{{ $follower->followers->count() }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
