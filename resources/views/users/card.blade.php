<div class="card border border-base-300 ml-8 z-0">
    <figure>
        {{-- ユーザーのメールアドレスをもとにGravatarを取得して表示 --}}
        <img class="rounded-2xl" src="{{ Gravatar::get($user->email, ['size' => 400]) }}" alt="">
    </figure>
</div>
