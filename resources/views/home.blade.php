@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
            <h3>Your Posts</h3>
            <p><a href="{{ route('posts.create') }}" class="btn btn-primary">投稿する</a></p>
            <table class='table table-hover'>
                <tr>
                    <th>投稿者</th>
                    <th>投稿内容</th>
                    <th>投稿日時</th>
                    <th>変更日時</th>
                </tr>
                @foreach($posts as $post)
                <tr>
                    <td>{{ $post->user->name }}</td>
                    <td>{{ $post->contents }}</td>
                    <td>{{ $post->created_at->format('Y-m-d H:i:s') }}</td>
                    <td>{{ $post->updated_at->format('Y-m-d H:i:s') }}</td>
                    @if(auth()->check() && auth()->user()->name === $post->user_name)
                    <td>
                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">更新</a>
                    </td>
                    <td>
                        <form method="POST" action="{{ route('posts.destroy', $post->id) }}" style="display: inline;" onsubmit="return confirm('本当に削除しますか？');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">削除</button>
                        </form>
                    </td>
                @endif
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection
