<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show(User $user)
    {
        $posts = $user->posts()->orderBy('created_at', 'desc')->get();
        return view('profiles.show', compact('user', 'posts'));
    }

    public function edit(User $user)
    {
        return view('profiles.edit', compact('user'));
    }

public function update(Request $request, User $user)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'bio' => 'nullable|string|max:500',
        'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // 古いユーザー名を保存
    $oldName = $user->name;

    if ($request->hasFile('icon')) {
        // アイコンの保存処理
        $path = $request->file('icon')->store('icons', 'public');
        $user->icon_url = '/storage/' . $path; // アイコンのURLを保存
    }

    // ユーザー名と自己紹介を更新
    $user->name = $request->input('name');
    $user->bio = $request->input('bio');
    $user->save();

    // 古いユーザー名と新しいユーザー名が異なる場合、posts テーブルを更新
    if ($oldName !== $user->name) {
        \DB::table('posts')->where('user_name', $oldName)->update(['user_name' => $user->name]);
    }

    return redirect()->route('profiles.show', $user->id)->with('message', 'プロフィールが更新されました。');
}
}
