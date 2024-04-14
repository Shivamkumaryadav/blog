@props(['post'])

<div class="flex justify-between">
    <div>
        <span>Author :</span>
        <span class="font-semibold"> {{ $post->user->name }}</span>
    </div>
    <a class="flex justify-end px-3 py-1 rounded-full scale-100 border border-[#F8586D] text-white bg-gradient-to-r from-[#F8586D] to-[#EB287D] hover:scale-110"
        href="{{ url('/post', $post->id) }}">Read more</a>
</div>