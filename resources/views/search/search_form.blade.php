<form method="GET" action="{{ route('news.index') }}">
    <input class="w-96 px-4 py-2 border-2 border-gray-300 rounded" type="text" name="search" placeholder="キーワードを入力してください..." value="{{ request('search') }}">

    <button class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 active:bg-blue-700" type="submit">検索</button>
</form>
