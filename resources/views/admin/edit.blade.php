@extends('layouts.app')

@section('content')

<div class="prose ml-4 px-8">
    <h2 class="text-lg">id: {{ $news->id }} のニュース編集ページ</h2>
</div>

<div class="flex justify-center">
    <form method="POST" action="{{ route('admin.update', $news->id) }}" class="w-1/2">
        @csrf
        @method('PUT')

        <div class="form-control my-2">
            <label for="title" class="label">
                <span class="label-text">タイトル:</span>
            </label>
            <input type="text" name="title" value="{{ $news->title }}" class="input input-bordered w-full">
        </div>

        <div class="form-control my-2">
            <label for="author" class="label">
                <span class="label-text">著者:</span>
            </label>
            <input type="text" name="author" value="{{ $news->author }}" class="input input-bordered w-full">
        </div>

        <div class="form-control my-2">
            <label for="image" class="label">
                <span class="label-text">画像:</span>
            </label>
            <input type="text" name="image" value="{{ $news->image }}" class="input input-bordered w-full">
        </div>

        <div class="form-control my-2">
            <label for="content" class="label">
                <span class="label-text">内容:</span>
            </label>
            <input type="text" name="content" value="{{ $news->content }}" class="input input-bordered w-full">
        </div>

        <button type="submit" class="btn btn-primary btn-outline my-3">更新</button>
    </form>
</div>

@endsection