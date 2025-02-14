@if(Auth::check())
    @if (Auth::user()->isFavorited($news->id))
    <!-- お気に入り解除ボタン -->
    <form action="{{ route('favorites.unfavorite', $news->id) }}" method="POST" class="flex">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-error btn-sm normal-case">
            <i class="fas fa-heart"></i> お気に入りを削除
        </button>
    </form>
    @else
    <!-- お気に入り追加ボタン -->
    <form action="{{ route('favorites.favorite', $news->id) }}" method="POST" class="flex">
        @csrf
        <button type="submit" class="btn bg-blue-500 hover:bg-blue-600 btn-sm normal-case text-white">
            <i class="far fa-heart"></i> お気に入り
        </button>
    </form>
    @endif
@else
    <button type="submit" class="btn btn-disabled btn-sm normal-case">
        <i class="far fa-heart"></i> お気に入り
    </button>
@endif
