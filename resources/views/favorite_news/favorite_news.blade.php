@if (isset($favorites))
    <ul class="list-none w-full p-0">
        @foreach ($favorites as $new)
        <li class="flex flex-col gap-x-4 p-4 mb-4 bg-gray-100 rounded-lg w-full">
            {{-- 投稿の所有者のメールアドレスをもとにGravatarを取得して表示 --}}
            <div class="">
                <img class=" w-full h-24 m-0 object-cover rounded" src="{{$new->image ?: asset('https://media.istockphoto.com/id/1313303632/ja/%E3%83%93%E3%83%87%E3%82%AA/%E4%B8%96%E7%95%8C%E7%9A%84%E3%81%AA%E5%9B%9E%E8%BB%A2%E5%9C%B0%E7%90%83%E3%82%B5%E3%82%A4%E3%83%90%E3%83%BC%E3%81%A8%E6%9C%AA%E6%9D%A5%E7%9A%84%E3%81%AA%E3%82%B9%E3%82%BF%E3%82%A4%E3%83%AB%E3%81%AB%E5%AF%BE%E3%81%97%E3%81%A63d%E3%83%8B%E3%83%A5%E3%83%BC%E3%82%B9%E3%83%86%E3%82%AD%E3%82%B9%E3%83%88%E3%81%A8%E3%83%90%E3%83%83%E3%82%B8%E3%82%92%E7%A0%B4%E3%82%8B%E3%83%86%E3%83%AC%E3%83%93%E6%94%BE%E9%80%81%E3%83%8B%E3%83%A5%E3%83%BC%E3%82%B9%E7%95%AA%E7%B5%84%E3%81%AE%E3%83%8B%E3%83%A5%E3%83%BC%E3%82%B9%E3%83%86%E3%83%B3%E3%83%97%E3%83%AC%E3%83%BC%E3%83%88%E3%82%A4%E3%83%B3%E3%83%88%E3%83%AD%E3%82%92%E7%A0%B4%E3%82%8A%E3%81%BE%E3%81%99.jpg?s=640x640&k=20&c=-Wfgg1Y53wAB0s7BNQRsUJY_bidEhC_fl2wPYerBA3s=') }}" alt="" />
            </div>

            <div class="flex flex-col justify-center">
                {{-- 投稿の所有者のユーザー詳細ページへのリンク --}}
                <a class="link link-hover text-info" href="{{ route('news.show', $new->id) }}">{{ $new->title }}</a>
                <span class="text-muted text-gray-500">投稿者： {{ $new->author }}</span>
                <span class="text-muted text-gray-500">投稿日： {{ $new->created_at->format('Y-m-d') }}</span>
            </div>

        </li>
        @endforeach
    </ul>
@endif
