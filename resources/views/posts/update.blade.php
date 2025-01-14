@extends('layouts.app')

@section('content')
<div class="container">
  <h2>Update a Post</h2>

  <form method="POST" action="{{ route('posts.update', $post->id) }}">
    @csrf
    @method('PUT')
    <div class="form-group">
      <label for="content">Content</label>
      <textarea class="form-control" id="content" name="content" required>{{ $post->contents }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
  </form>
  @if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif
</div>
@endsection
