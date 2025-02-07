@if (Auth::check())
    <li><a class="link link-hover text-white" href="{{ route('news.index') }}">ニュース</a></li>

<li>
    <details class="dropdown dropdown-end">
        <summary class="text-white">{{ Auth::user()->name }}
        </summary>
        <ul tabindex="0" class="dropdown-content z-[1] w-52 p-2 shadow">
            <li><a class="text-black" href="{{ route('users.show', Auth::user()->id) }}">ユーザー詳細</a></li>
            <li><a class="text-black" href="{{ route('users.favorites', Auth::user()->id) }}">お気に入り一覧</a></li>
            {{-- ログアウトへのリンク --}}
            <li><a class="text-black" href="#" onclick="event.preventDefault();this.closest('form').submit();">ログアウト</a></li>
        </ul>
    </details>
</li>

@else
    {{-- ユーザー登録ページへのリンク --}}
    <li><a class="link link-hover text-white" href="{{ route('register') }}">新規登録</a></li>
    <li class="divider lg:hidden"></li>
    {{-- ログインページへのリンク --}}
    <li><a class="link link-hover text-white" href="{{ route('login') }}">ログイン</a></li>
@endif