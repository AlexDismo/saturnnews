@extends('layouts.base', ['title' => 'Post Page'])

@section('content')
    <section class="pb-16">
        <div class="max-w-[1030px] mx-auto px-4 sm:px-8 xl:px-0">
            <div class="max-w-[770px] mx-auto text-center">
                <div class="flex flex-wrap justify-center gap-4 items-center p-14">
                    @if($post->tags->isEmpty())
                        <a href=""
                           class="font-medium text-sm py-1 px-3 rounded-full {{ getTagClass('NoTags') }}">
                            No Tags
                        </a>
                    @else
                        @foreach($post->tags as $tag)
                            <a href=""
                               class="font-medium text-sm py-1 px-3 rounded-full {{ getTagClass($tag->name) }}">
                                {{$tag->name}}
                            </a>
                        @endforeach
                    @endif
                </div>

                <h1 class="font-bold text-2xl sm:text-4xl lg:text-custom-2 text-dark mb-5">
                    {{$post->title}}
                </h1>
                <div class="flex items-center justify-center gap-4 mt-7.5">
                    <div class="flex w-12 h-12 rounded-full overflow-hidden">
                        <img src="{{getAvatarSource($post->author->avatar)}}" alt="user">
                    </div>
                    <div class="text-left">
                        <h4 class="font-medium text-custom-lg text-dark mb-1">
                            {{$post->author->name}}
                        </h4>
                        <div class="flex items-center gap-1.5">
                            <p>{{$post->created_at->format('M d, Y')}}</p>
                            <span class="flex w-[3px] h-[3px] rounded-full bg-dark-2"></span>
                        </div>
                    </div>
                </div>
            </div>
            <img src="{{$post->thumbnail}}" alt="blog" class="mt-10 mb-11 mx-auto">
            <div class="max-w-[770px] mx-auto">
                <div>
                    <p class="mb-5 text-body">
                        {{$post->content}}
                    </p>
                </div>

                <button class="flex justify-center font-medium text-gray-900 border border-gray-500 rounded-md py-3 px-7 hover:bg-gray-700 hover:text-white ease-in duration-200 mx-auto mt-10">
                    View all Posts
                </button>

            </div>
        </div>
    </section>

@endsection
