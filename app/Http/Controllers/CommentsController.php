<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\News;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store(Request $request)
    {
        if (\Auth::check()) {
            $request->validate([
                'content' => 'required|string|max:500',
            ]);

            $comment = new Comment();

            $comment->create([
                'news_id' => $request->route('id'),
                'user_id' => auth()->id(),
                'content' => $request->content,
            ]);

            return back()->with('success', 'コメントを追加しました！');
        }
    }

    public function destroy(string $id)
    {
        $comment = Comment::findOrFail($id);
        if (\Auth::id() === $comment->user_id) {
            $comment->delete();
            return back()
                ->with('success','コメントは削除されました!');
        }

        return back()->with('error','削除に失敗しました!');
    }
}
