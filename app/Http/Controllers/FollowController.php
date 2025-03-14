<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class FollowController extends Controller
{
    public function store(User $user)
    {
        // フォロー処理
        auth()->user()->follows()->attach($user->id);
        return redirect()->back()->with('message', 'フォローしました');
    }

    public function destroy(User $user)
    {
        // フォロー解除処理
        auth()->user()->follows()->detach($user->id);
        return redirect()->back()->with('message', 'フォローを解除しました');
    }

    public function index(User $user)
{
    $follows = $user->follows; // フォローしているユーザー
    return view('follow.follows', compact('follows'));
}

public function followers(User $user)
{
    $followers = $user->followers; // フォロワー
    return view('follow.followers', compact('followers'));
}
}
