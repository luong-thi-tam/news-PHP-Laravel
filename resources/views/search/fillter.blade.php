<form method="GET" action="{{ route('news.index') }}">
    <select class="w-64 p-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" name="filter_date">
        <option value="">時間を選択</option>
        <option value="today" {{ request('filter_date') == 'today' ? 'selected' : '' }}>今日</option>
        <option value="this_week" {{ request('filter_date') == 'this_week' ? 'selected' : '' }}>今週</option>
        <option value="this_month" {{ request('filter_date') == 'this_month' ? 'selected' : '' }}>今月</option>
    </select>

    <button class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 active:bg-blue-700" type="submit">フィルター</button>
    <a class="px-4 py-2 border border-blue-500 text-blue-500 rounded hover:bg-blue-500 hover:text-white" href="{{ route('news.index') }}">削除</a>
</form>
