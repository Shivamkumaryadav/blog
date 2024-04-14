@props(['post'])


<a href="?category={{ $post->category->category }}"
    class="my-2 px-3 py-1  rounded-full text-white bg-orange-500 hover:bg-orange-600 text-pretty">
    {{ $post->category->category }}
</a>