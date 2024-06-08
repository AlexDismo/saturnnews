<div id="post-container" class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-y-11 gap-x-7">
    @foreach($posts as $post)
        @include('components.main.post_card', ['post' => $post])
    @endforeach
</div>
