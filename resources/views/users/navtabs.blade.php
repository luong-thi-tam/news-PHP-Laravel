<div class="tabs tabs-lifted mx-8 z-0">
    {{-- ユーザー詳細タブ --}}
    <a href="{{ route('users.show', $user->id) }}" class="font-bold text-lg tab grow {{ Request::routeIs('users.show') ? 'tab-active' : '' }}">
        ユーザー詳細
    </a>
    {{-- お気に入り一覧タブ --}}
    <a href="{{ route('users.favorites', $user->id) }}" class="font-bold text-lg tab grow {{ Request::routeIs('users.favorites') ? 'tab-active' : '' }}">
        お気に入り一覧
        <div class="badge badge-neutral ml-1">{{ $user->favorites_count }}</div>
    </a>
</div>