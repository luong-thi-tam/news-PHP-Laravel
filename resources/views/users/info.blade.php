<div class="mx-8 my-6">
    <div class="mb-4">
        <label class="block text-lg font-semibold">名前：</label>
        <p class="text-lg">{{ $user->name }}</p>
    </div>
    <div class="mb-4">
        <label class="block text-lg font-semibold">登録メールアドレス：</label>
        <p class="text-lg">{{ $user->email }}</p>
    </div>
    @if(Auth::id() == $user->id)
        <div class="mb-4">
            <label class="block text-lg font-semibold">パスワード：</label>
            <p class="text-lg">**********</p>
        </div>

        <div class="mt-6">
            <a href="" class="inline-block px-6 py-2 bg-blue-500 text-white rounded-lg">編集</a>
        </div>
    @endif
    

</div>