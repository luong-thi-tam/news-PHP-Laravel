@extends('layouts.app')

@section('content')

<div class="w-full px-4 flex justify-between">
    <h2 class="text-lg">ニュース一覧</h2>
    {{-- タスク作成ページへのリンク --}}
    <a class="btn btn-primary" href="{{ route('admin.create') }}">新規ニュースの投稿</a>
</div>


@if (isset($news))
<table class="table table-zebra w-full my-4">
    <thead>
        <tr>
            <th>id</th>
            <th>タイトル</th>
            <th>投稿者</th>
            <th>コンテンツ</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($news as $new)
        <tr>
            <td><a class="link link-hover text-info" href="{{ route('admin.showAdmin', $new->id) }}">{{ $new->id }}</a></td>
            <td>{{ $new->title }}</td>
            <td>{{ $new->author }}</td>
            <td>{{ $new->content }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif

{{-- ページネーションのリンク --}}
{{ $news->links() }}
@endsection