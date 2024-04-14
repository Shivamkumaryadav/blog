@props(['post'])
<div class="w-full flex gap-5 hover:border-[1px] border-gray-300 p-1 rounded-lg hover:bg-white hover:text-blue-500 hover:underline">
    <a href="{{ route('post', $post->id) }}" class="text-semibold flex gap-5 flex-wap">
        <div class="flex  w-20 h-20 overflow-hidden rounded-md">
            <img class="object-cover w-32 h-full" src="/images/{{ $post->image }}" alt="post-img">
        </div>

        <div class="flex-1  md:px-5 mt-1 ">
            {!! $post->title !!}
        </div>
    </a>
</div>