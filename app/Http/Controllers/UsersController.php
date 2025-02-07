<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function show($id)
    {
        // idの値でユーザーを検索して取得
        $user = User::findOrFail($id);
        
        // 関係するモデルの件数をロード
        $user->loadRelationshipCounts();
        
        // ユーザーの投稿一覧を作成日時の降順で取得
        // $microposts = $user->microposts()->orderBy('created_at', 'desc')->paginate(10);

        // ユーザー詳細ビューでそれを表示
        return view('users.show', [
            'user' => $user,
        ]);
    }

    public function favorites($id)
    {
        $user = User::findOrFail($id);

        $user->loadRelationshipCounts();

        $favorites = $user->favorites()->paginate(10);

        return view('users.favorites', [
            'user' => $user,
            'news' => $favorites,
        ]);
    }
}
