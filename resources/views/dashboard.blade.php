@extends('layouts.app')

@section('content')
    <div class="py-4 px-8 flex items-center justify-between">
        @include('search.search_form')
        @include('search.fillter')
    </div>
    <div class="grid grid-cols-5 gap-4 prose hero mx-auto max-w-full rounded px-8">
        <div class="col-span-4 w-full pr-8">
        @include('news.news')
        </div>
        <div class="col-span-1">
        @include('favorite_news.favorite_news')
        </div>
    </div>
@endsection