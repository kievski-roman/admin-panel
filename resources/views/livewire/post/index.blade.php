<div>
    <h1 class="text-xl font-semibold mb-4">Товары</h1>
    <ul>
        @foreach($posts as $post)
            <li>{{ $post->title }}</li>

        @endforeach
    </ul>
    @dd($user)
    {{ $posts->links() }}
</div>
