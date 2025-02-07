@if (Auth::id() == $user->id)
    <div class="mt-4">
        <form method="POST" action="{{ route('comments.store', $news->id) }}">
            @csrf
        
            <div class="form-control mt-4 mb-2">
                <textarea rows="2" name="content" class="input input-bordered w-full"></textarea>
            </div>
        
            <button type="submit" class="btn bg-blue-500 hover:bg-blue-600 btn-block normal-case text-white">投稿</button>
        </form>
    </div>
@endif