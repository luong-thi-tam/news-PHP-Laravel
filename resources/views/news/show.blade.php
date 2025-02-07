@extends('layouts.app')

@section('content')
<div class="sm:grid sm:grid-cols-3 sm:gap-10">
    <div class="sm:col-span-2 mt-5">
        @include('news.detail')
    </div>
    <div class="mr-8 mt-5 p-4">
        @if(Auth::check())
            @include('comments.form')
        @endif
        @include('comments.comments')
        
    </div>
</div>
@endsection