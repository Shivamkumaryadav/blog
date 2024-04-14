@extends('layouts.home')
@section('content')


{{-- category and search bar --}}
{{-- <div class="flex justify-around my-5">
    <div class="flex gap-5">
        <input class="rounded-full " type="search" class=" w-32 focus:w-52">
        <button class="px-3 py-2 rounded-full bg-gradient-to-r from-[#F8586D] to-[#EB287D]" type="submit">
            Search
        </button>
    </div>
    <div class=" ">
        <form action="" method="POST">
            @csrf

            <div class="flex gap-5">
                <input class="rounded-full " type="search" class=" w-32 focus:w-52">
                <button class="px-3 py-2 rounded-full bg-gradient-to-r from-[#F8586D] to-[#EB287D]" type="submit">
                    Search
                </button>
            </div>
        </form>
    </div>
</div> --}}
{{-- posts --}}
<div class="px-5 md:px-5 bg-gray my-5">
    {{-- fetaured post --}}
    <h1 class="font-bold text-xl my-3 text-center">Featured posts</h1>
    @foreach ($posts->take(1) as $post )
    <div class="lg:flex justify-between  gap-5 mb-20">
        <div class="md:flex-1 ">
            <div class="bg-white p-1 border border-gray-200 rounded-lg ">
                <div class="w-full overflow-hidden rounded-md">
                    <img class="w-full object-fill h-80 md:h-[25rem] rounded-md " src="/images/{{ $post->image }}"
                        alt="post-img">
                </div>
                <div class="px-5 my-3 ">
                    <a href="" class="my-2 px-3 py-1 border rounded-full border-blue-600 text-pretty">category</a>
                    <h1 class="font-semibold my-2">
                        {{ $post->title }}
                    </h1>
                    <p class="my-3">
                        {{ $post->excerpt }}
                    </p>
                    <div class="flex justify-between">
                        <a class="w-ful flex justify-end px-3 py-1 rounded-full border border-[#F8586D] hover:text-white hover:bg-gradient-to-r from-[#F8586D] to-[#EB287D]"
                            href="">Read more</a>
                    </div>
                </div>
            </div>

        </div>
        {{-- recent posts and comments --}}
        <div
            class="my-5 lg:border-[1px] border-gray-200 rounded-lg lg:my-0 md:flex flex-col gap- md:w-full lg:w-[500px] lg:p-2">
            <h1>Recent Posts</h1>
            <x-admin.recent-post />
            <x-admin.recent-post />
            <h1>Recent comments</h1>
            <x-admin.recent-comment />
            <x-admin.recent-comment />


        </div>

    </div>
    @endforeach

    {{-- most recent posts --}}
    <h1 class="font-semibold my-3">Most recent posts</h1>
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5">

        @foreach ($posts->skip(1) as $post )
        <x-post.posts :$post />
        @endforeach
    </div>
</div>
@include('layouts.footer')
@endsection