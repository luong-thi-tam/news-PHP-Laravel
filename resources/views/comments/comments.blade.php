<div class="mt-4">
    @if (isset($comments))
        <ul class="list-none">
            @foreach ($comments as $comment)
                <li class="flex items-start gap-x-4 mb-4">
                    {{-- 投稿の所有者のメールアドレスをもとにGravatarを取得して表示 --}}
                    <div class="avatar">
                        <div class="w-12 rounded">
                            <img src="{{ Gravatar::get($comment->user->email) }}" alt="" />
                        </div>
                    </div>
                    <div class="w-full">
                        <div class="flex justify-between items-center">
                            {{-- 投稿の所有者のユーザー詳細ページへのリンク --}}
                            <a class="link link-hover text-info" href="{{ route('users.show', $comment->user->id) }}">{{ $comment->user->name }}</a>
                            <span class="text-muted text-gray-500 text-xs">{{ $comment->created_at->format('Y-m-d') }}</span>
                        </div>
                        <div>
                            {{-- 投稿内容 --}}
                            <p class="mb-0">{!! nl2br(e($comment->content)) !!}</p>
                        </div>
                        <div class="flex justify-end items-center">
                                @if (Auth::id() == $comment->user_id)
                                {{-- 投稿削除ボタンのフォーム --}}
                                <form method="POST" action="{{ route('comments.destroy', $comment->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-error btn-xs normal-case text-xs" onclick="return confirm('「{{ $comment->content }}」のコメントを削除してもよろしいですか? ?')">削除</button>
                                </form>
                                @endif
                            </div>

                    </div>
                    
                </li>
            @endforeach
        </ul>
        {{-- ページネーションのリンク --}}
        {{ $comments->links() }}
    @endif
</div>