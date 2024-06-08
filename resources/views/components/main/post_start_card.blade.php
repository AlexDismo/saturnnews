<div class="lg:max-w-[570px] w-full flex flex-col sm:flex-row sm:items-center gap-6 bg-white shadow-1 rounded-xl p-2.5">
    <div class="lg:max-w-[238px] w-full">
        <div href="{{ route('posts.show', ['id' => $post->id]) }}">
            <a href="{{ route('posts.show', ['id' => $post->id]) }}">
                <img class="w-full" src="{{$post->thumbnail}}" alt="hero">
            </a>
        </div>
    </div>
    <div class="lg:max-w-[272px] w-full">
        <a href="#"
           class="{{ getTagClass($post->tags->isEmpty() ? 'NoTags' : $post->tags[0]->name) }} bg-opacity-50 inline-flex font-medium text-sm py-1 px-3 rounded-full mb-4">
            {{$post->tags->isEmpty() ? 'No Tags' : $post->tags[0]->name}}
        </a>
        <h2 class="font-bold text-custom-lg mb-3">
            <a href="{{ route('posts.show', ['id' => $post->id]) }}">
                {{$post->title}}
            </a>
        </h2>
        <div class="flex items-center gap-2.5">
            <p class="text-sm">
                <a href="">by {{$post->author->name}}</a>
            </p>
            <span class="flex w-[3px] h-[3px] rounded-full bg-gray-700"></span>
            <p class="text-sm">{{$post->created_at->format('M d, Y')}}</p>
        </div>
    </div>
</div>
