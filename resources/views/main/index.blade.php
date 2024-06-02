@extends('layouts.base', ['title' => 'Main page'])

@section('content')
    <div class="mx-auto max-w-[1170px] px-4 sm:px-8 xl:px-0 relative z-1 font-light mt-6">


        <section class="flex flex-wrap gap-x-7.5 gap-y-9">

            {{--start blocks--}}
            <div class="max-w-[1170px] w-full flex flex-col lg:flex-row lg:items-center gap-7.5 lg:gap-11 bg-white shadow-1 rounded-xl p-4 lg:p-2.5">
                <div class="lg:max-w-[536px] w-full">
                    <a href="">
                        <img class="w-full" src="{{$randomPosts[0]->thumbnail}}" alt="hero">
                    </a>
                </div>
                <div class="lg:max-w-[540px] w-full">
                    <a href=""
                       class="{{getTagClass($randomPosts[0]->tags->isEmpty() ? 'No Tags' : $randomPosts[0]->tags[0]->name) }} bg-opacity-50 inline-flex font-medium text-sm py-1 px-3 rounded-full mb-4">
                        {{$randomPosts[0]->tags->isEmpty() ? 'No Tags' : $randomPosts[0]->tags[0]->name}}
                    </a>
                    <h1 class="font-bold text-custom-4 xl:text-heading-4 text-dark mb-4">
                        <a href="">
                            {{$randomPosts[0]->title}}
                        </a>
                    </h1>
                    <p class="max-w-[524px]">
                        {{$randomPosts[0]->content}}
                    </p>
                    <div class="flex items-center gap-2.5 mt-5">
                        <a href="" class="flex items-center gap-3">
                            <div class="flex w-6 h-6 rounded-full overflow-hidden">
                                <img src="/storage/users/avatars/{{$randomPosts[0]->author->avatar}}" alt="user">
                            </div>
                            <p class="text-sm">by {{$randomPosts[0]->author->name}}</p>
                        </a>
                        <span class="flex w-[3px] h-[3px] rounded-full bg-dark-2"></span>
                        <p class="text-sm">{{$randomPosts[0]->created_at->format('M d, Y')}}</p>
                    </div>
                </div>
            </div>

            <div class="flex justify-between w-full">
                @include('components.main.post_start_card', ['post' => $randomPosts[2]])

                @include('components.main.post_start_card', ['post' => $randomPosts[1]])
            </div>
        </section>


        <section class="pt-20 lg:pt-25 pb-15">

            <div class="">

                <div class="max-w-[1170px] mx-auto px-4 sm:px-8 xl:px-0">
                    <div class="mb-12.5 text-center">
                        <h2 class="text-dark mb-3.5 text-2xl font-bold sm:text-4xl xl:text-heading-3">
                            Browse by Category
                        </h2>
                        <p>Select a category to see more related content</p>
                    </div>
                </div>

                @include('includes.main.tag_filter', ['tags' => $tags])

                <div>
                    @include('includes.main.card_block', ['posts' => $posts])
                </div>

                <button id="load-more" class="flex justify-center font-medium text-dark border border-gray-700 rounded-md py-3 px-7 hover:bg-gray-700 hover:text-white ease-in duration-200 mx-auto mt-12.5 lg:mt-12">
                    Browse all Posts
                </button>
            </div>





        </section>



    </div>
</div>
@endsection
