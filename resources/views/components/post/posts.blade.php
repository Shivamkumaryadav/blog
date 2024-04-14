@props(['post'])

<div class="bg-white p-1 hover:bg-gray-50 hover:border border-gray-200 rounded-lg ">
    <div class="overflow-hidden rounded-lg">
        <img class="w-full h-70 md:h-64 object-cover rounded-lg " src="images/{{ $post->image }}" alt="post-img">
    </div>
    <div class="my-3">
        <div class="flex justify-between gap-5 items-center">
            <x-post.category-link :$post />
            <div>
                Posted : {{ $post->created_at->diffForHumans() }}
            </div>
        </div>
       <div class="mt-3">
        <a href="{{ url('/post', $post->id) }}" class="font-semibold my-2">
            {{$post->title}}
        </a>
       </div>
        <p class="my-3">
            {{ $post->excerpt }}
        </p>
        <x-post.read-more :$post />
    </div>
</div>