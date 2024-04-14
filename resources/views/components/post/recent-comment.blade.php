@props(['comment'])
<div class="w-full  hover:border-[1px] border-gray-300 p-1 rounded-lg ">
        <div class="flex">
           post title : {{ $comment->post->title }}
        </div>
<div>{!! $comment->comment !!}</div>
</div>