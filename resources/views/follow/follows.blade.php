@extends('layouts.app')

@section('content')
<div class="container">
    <h1>フォロー一覧</h1>
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
            @foreach($follows as $follow)
                <tr>
                    <td><img src="{{ $follow->icon_url }}" alt="{{ $follow->name }}のアイコン" style="width: 50px; height: 50px;" class="rounded-circle"></td>
                    <td><a href="{{ route('profiles.show', $follow->id) }}">{{ $follow->name }}</a></td>
                    <td>{{ $follow->follows->count() }}</td>
                    <td>{{ $follow->followers->count() }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
