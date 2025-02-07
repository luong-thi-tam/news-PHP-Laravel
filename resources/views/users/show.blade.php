@extends('layouts.app')

@section('content')
<div class="sm:grid sm:grid-cols-3 sm:gap-10 px-8">
    <aside class="mt-4 mb-2">
        {{-- ユーザー情報 --}}
        @include('users.card')
    </aside>
    <div class="sm:col-span-2 mt-4">
        {{-- タブ --}}
        @include('users.navtabs')
        {{-- 投稿一覧 --}}
        @include('users.info')
    </div>
</div>
@endsection