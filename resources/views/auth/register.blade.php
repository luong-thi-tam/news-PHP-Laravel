@extends('layouts.app')

@section('content')

    <div class="prose mx-auto text-center">
        <h2>新規登録</h2>
    </div>

    <div class="flex justify-center">
        <form method="POST" action="{{ route('register') }}" class="w-1/2">
            @csrf

            <div class="form-control my-4">
                <label for="name" class="label">
                    <span class="label-text">名前</span>
                </label>
                <input type="text" name="name" class="input input-bordered w-full">
            </div>

            <div class="form-control my-4">
                <label for="email" class="label">
                    <span class="label-text">メール</span>
                </label>
                <input type="email" name="email" class="input input-bordered w-full">
            </div>

            <div class="form-control my-4">
                <label for="password" class="label">
                    <span class="label-text">パスワード</span>
                </label>
                <input type="password" name="password" class="input input-bordered w-full">
            </div>

            <div class="form-control my-4">
                <label for="password_confirmation" class="label">
                    <span class="label-text">パスワード確認</span>
                </label>
                <input type="password" name="password_confirmation" class="input input-bordered w-full">
            </div>

            <button type="submit" class="btn bg-blue-500 hover:bg-blue-600 btn-block normal-case text-white">新規登録</button>

            {{-- ユーザー登録ページへのリンク --}}
            <p class="mt-2">アカウントをお持ちですか？ <a class="link link-hover text-info" href="{{ route('login') }}">今すぐログインしてください！</a></p>
        </form>
    </div>
@endsection