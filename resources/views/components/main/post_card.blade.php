<div class="flex flex-wrap items-start">
    <div class="mb-6 overflow-hidden rounded-[10px] transition-all group-hover:scale-105">
        <a href="{{ route('posts.show', ['id' => $post->id]) }}">
            <img src="{{$post->thumbnail}}" alt="image" class="w-full h-auto object-cover">
        </a>
    </div>
    <h3>
        <a href="{{ route('posts.show', ['id' => $post->id]) }}" class="block text-dark font-bold text-xl mb-4">
                <span class="bg-gradient-to-r from-primary/50 to-primary/40 bg-[length:0px_10px] bg-left-bottom bg-no-repeat transition-[background-size] duration-500 hover:bg-[length:100%_3px] group-hover:bg-[length:100%_10px]">
                {{$post->title}}
                </span>
        </a>
    </h3>
    <p>
        {{$post->content}}
    </p>
    <div class="flex flex-wrap justify-between mt-4 w-full">
        <div class="flex flex-col gap-2">
            <a href="" class="flex items-center gap-3">
                <div class="flex w-6 h-6 rounded-full overflow-hidden">
                    <img src="{{getAvatarSource($post->author->avatar)}}" alt="user">
                </div>
                <p class="text-sm">by {{$post->author->name}}</p>
            </a>
            <p class="text-sm">{{$post->created_at->format('M d, Y')}}</p>
        </div>
        <a href="" class="h-8 inline-flex text-blue bg-blue/[0.08] font-medium text-sm py-1 px-3 rounded-full {{ getTagClass($post->tags->isEmpty() ? 'NoTags' : $post->tags[0]->name) }}">{{$post->tags->isEmpty() ? 'No Tags' : $post->tags[0]->name}}</a>
    </div>
</div>
