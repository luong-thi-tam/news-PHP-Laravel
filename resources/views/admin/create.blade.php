@extends('layouts.app')

@section('content')

<div class="prose ml-4">
    <h2 class="text-lg">ニュース新規作成ページ</h2>
</div>

<div class="flex justify-center">
    <form method="POST" action="{{ route('admin.store') }}" class="w-1/2">
        @csrf

        <div class="form-control my-2">
            <label for="title" class="label">
                <span class="label-text">タイトル:</span>
            </label>
            <input type="text" name="title" class="input input-bordered w-full">
        </div>

        <div class="form-control my-2">
            <label for="author" class="label">
                <span class="label-text">投稿者　:</span>
            </label>
            <input type="text" name="author" class="input input-bordered w-full">
        </div>

        <div class="form-control my-2">
            <label for="content" class="label">
                <span class="label-text">コンテンツ:</span>
            </label>
            <input type="text" name="content" class="input input-bordered w-full">
        </div>

        <div class="form-control my-2">
            <label for="image" class="label">
                <span class="label-text">イメージリンク:</span>
            </label>
            <input type="text" name="image" class="input input-bordered w-full">
        </div>

        <button type="submit" class="btn btn-primary btn-outline my-4">投稿</button>
    </form>
</div>

@endsection