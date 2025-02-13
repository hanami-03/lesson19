<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function search(Request $request)
    {
        // 検索クエリを取得
        $query = $request->input('query');

        // 検索クエリが空の場合は全ユーザーを取得
        if (empty($query)) {
            $users = User::all(); // 全ユーザーを取得
        } else {
            // ユーザーを検索
            $users = User::where('name', 'LIKE', "%{$query}%")->get();
        }

        // 検索結果をビューに渡す
        return view('users.search', compact('users'));
    }
}
