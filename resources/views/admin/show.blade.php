
@extends('layouts.app')

@section('content')

<div class="px-8">
    <div class="prose ml-4">
        <h2>id = {{ $news->id }} のニュース詳細ページ</h2>
    </div>

    <table class="table w-full my-4">
        <tr>
            <th>タイトル</th>
            <td>{{ $news->title }}</td>
        </tr>

        <tr>
            <th>著者</th>
            <td>{{ $news->author }}</td>
        </tr>

        <tr>
            <th>画像</th>
            <td>{{ $news->image }}</td>
        </tr>

        <tr>
            <th>内容</th>
            <td>{{ $news->content }}</td>
        </tr>


    </table>

    <div class='flex gap-4 items-center'>
        {{-- タスク編集ページへのリンク --}}
        <a class="btn btn-outline" href="{{ route('admin.edit', $news->id) }}">このニュースを編集</a>

        {{-- タスク削除フォーム --}}
        <form method="POST" action="{{ route('admin.destroy', $news->id) }}" class="my-2">
            @csrf
            @method('DELETE')

            <button type="submit" class="btn btn-error btn-outline" onclick="return confirm('id = {{ $news->id }} のニュースを削除します。よろしいですか？')">削除</button>
        </form>

    </div>
</div>






@endsection
