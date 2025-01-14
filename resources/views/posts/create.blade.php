@extends('layouts.app')

@section('content')
<div class="container">
  <h2>Create a New Post</h2>

  <form method="POST" action="{{ route('posts.store') }}">
    @csrf
    <div class="form-group">
      <label for="user_name">User Name</label>
      <input type="text" class="form-control" id="user_name" name="user_name" value="{{ $user_name }}" readonly>
    </div>
    <div class="form-group">
      <label for="content">Content</label>
      <textarea class="form-control" id="content" name="content" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
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
