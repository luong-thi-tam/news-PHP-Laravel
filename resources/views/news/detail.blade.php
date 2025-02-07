<div class="p-4 ml-8">
    <h2 class="font-semibold text-2xl mb-3">{{$news->title}}</h2>
    <div class="sm:flex sm:gap-4 mb-2 items-center">
        <span>{{$news->author}}</span>
        <span>{{$news->created_at->format('Y-m-d')}}</span>
        @include('favorite_news.favorite_button')
    </div>
    <div>
        <div class="w-2/3">
            <img class="m-0 object-cover rounded" src="{{$news->image ?: asset('https://media.istockphoto.com/id/1313303632/ja/%E3%83%93%E3%83%87%E3%82%AA/%E4%B8%96%E7%95%8C%E7%9A%84%E3%81%AA%E5%9B%9E%E8%BB%A2%E5%9C%B0%E7%90%83%E3%82%B5%E3%82%A4%E3%83%90%E3%83%BC%E3%81%A8%E6%9C%AA%E6%9D%A5%E7%9A%84%E3%81%AA%E3%82%B9%E3%82%BF%E3%82%A4%E3%83%AB%E3%81%AB%E5%AF%BE%E3%81%97%E3%81%A63d%E3%83%8B%E3%83%A5%E3%83%BC%E3%82%B9%E3%83%86%E3%82%AD%E3%82%B9%E3%83%88%E3%81%A8%E3%83%90%E3%83%83%E3%82%B8%E3%82%92%E7%A0%B4%E3%82%8B%E3%83%86%E3%83%AC%E3%83%93%E6%94%BE%E9%80%81%E3%83%8B%E3%83%A5%E3%83%BC%E3%82%B9%E7%95%AA%E7%B5%84%E3%81%AE%E3%83%8B%E3%83%A5%E3%83%BC%E3%82%B9%E3%83%86%E3%83%B3%E3%83%97%E3%83%AC%E3%83%BC%E3%83%88%E3%82%A4%E3%83%B3%E3%83%88%E3%83%AD%E3%82%92%E7%A0%B4%E3%82%8A%E3%81%BE%E3%81%99.jpg?s=640x640&k=20&c=-Wfgg1Y53wAB0s7BNQRsUJY_bidEhC_fl2wPYerBA3s=') }}" alt="" />
        </div>
        <div class="mt-3">
        <p>{{$news->content}}</p>
        </div>
    </div>

</div>