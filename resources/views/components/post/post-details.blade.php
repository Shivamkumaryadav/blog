@props(['post'])

<div class="w-full px-4 my-5 md:px-10">
    <div class="hidden pl-32 md:flex justify-center">

        <a href="/"
            class="flex items-center bg-orange-300 scale-75 px-3 py-1 rounded-full text-white font-bold hover:scale-100">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="m18.75 4.5-7.5 7.5 7.5 7.5m-6-15L5.25 12l7.5 7.5" />
            </svg>
            <span>
                back to posts
            </span>
        </a>
    </div>
    <div class="grid md:grid-cols-2 gap-5">
        <div class="flex overflow-hidden rounded-lg">
            <img class="w-full object-fill" src="/images/{{ $post->image }}" alt="image">
        </div>
        <div>
            <div class="md:px-3">
                <h2 class="text-2xl font-bol mb-5">
                    {{ $post->title }}
                </h2>
                <p class="text-sm mb-5">
                    {{ $post->description }}
                </p>
            </div>
        </div>
    </div>
</div>