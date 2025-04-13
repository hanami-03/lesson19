<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class PostController extends Controller
{
  public function create()
  {
    $user = Auth::user();
    return view('posts.create', ['user_name' => $user->name]);
  }

  public function store(Request $request)
  {

    $request->validate([
        'content' => 'required|string|max:150|regex:/^[^\x{3000}]+$/u',
    ]);


    $user = Auth::user();

    $post = new Post();
    $post->contents = $request->input('content');
    $post->user_name = $user->name;
    $post->save();

    return redirect()->route('home')->with('message', 'Post create successfully');
  }

  public function edit(Post $post)
  {
    return view('posts.update', compact('post'));
  }

  public function update(Request $request, Post $post)
  {
    $request->validate([
        'content' => 'required|string|max:150|regex:/^[^\x{3000}]+$/u',
    ]);

        $post->contents = $request->input('content');
        $post->save();

    return redirect()->route('home')->with('message', 'Post update successfully');
  }

  public function destroy(Post $post)
  {
    $post->delete();

    return redirect()->route('home')->with('message', 'Post deleted successfully');
  }
}
