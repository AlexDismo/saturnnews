<div class="flex flex-wrap justify-center gap-4 items-center p-14">
    @foreach($tags as $tag)
        <a href="javascript:void(0);"
           id="tag-{{ $loop->index }}"
           class="tag font-medium text-sm py-1 px-3 rounded-full {{getTagClass($tag)}} {{ $loop->first ? 'selectedTag' : '' }}">
            {{$tag}}
        </a>
    @endforeach
</div>
