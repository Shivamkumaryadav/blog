@extends('layouts.home')
@section('content')


{{-- category and search bar --}}
<div class="flex justify-around my-5">
    <div class="w-full">
        <div class="w-full md:flex md:justify-evenly items-center space-y-5 md:space-y-0">
            <div class="w-full md:flex justify-center px-6">
                <form action="/" method="GET">

                    <select id="category" class="w-full md:w-64 rounded-full hover:cursor-pointer" name="category">
                        <option value="" selected hidden>Category</option>
                        <option id="all-category" value="All" selected>All</option>
                        @foreach ($categories as $category)
                        <option {{ $category->category == request('category') ? 'selected' : '' }}
                            class="category-links {{ $category->category == request('category') ? 'bg-ble-50' :
                            'text-black' }}"
                            value="{{ $category->category }}">
                            {{ $category->category }}
                        </option>
                        @endforeach
                    </select>
                </form>
            </div>
            {{-- search --}}
            <div class="w-full md:flex justify-center items-center px-6">
                <form action="/" method="GET">

                    <div class="md:flex gap-5">
                        <input placeholder="Search by title.." required class="w-full rounded-full md:w-48 md:focus:w-64 " type="search" name="search"
                            value="{{ request('search') }}">
                        <div class="flex items-center gap-5">
                            <a href="{{ url('/') }}" class="w-full text-center bg-yellow-500 px-3 py-2 rounded-full text-white my-2 md:my-0">
                                Clear
                            </a>
                            <button type="submit" class="w-full bg-gradient-to-r from-[#F8586D] to-[#EB287D] h-10 px-3 rounded-full text-white md:hidden">
                                Search
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- posts --}}
<div class="px-5 md:px-5 bg-gray my-5">
    @forelse ($posts->take(1) as $post )
    <div class="lg:flex justify-between  gap-5 mb-20">
        <div class="md:flex-1 ">
            <div class="bg-white p-1 hover:bg-gray-100 hover:border border-gray-200 rounded-lg ">
                <div class="w-full overflow-hidden rounded-md">
                    <img class="w-full object-fill h-80 md:h-[25rem] rounded-md " src="/images/{{ $post->image }}"
                        alt="post-img">
                </div>
                <div class="my-3 ">
                    <div class="flex justify-between gap-5 items-center">
                        <x-post.category-link :$post />
                        <div>
                            Posted : {{ $post->created_at->diffForHumans() }}
                        </div>
                    </div>
                    <h1 class="font-semibold my-2">
                        {{ $post->title }}
                    </h1>
                    <p class="my-3">
                        {{ $post->excerpt }}
                    </p>
                    {{-- read more link --}}
                    <x-post.read-more :$post />
                </div>
            </div>

        </div>
        {{-- recent posts and comments --}}
        <div
            class="hover:lg:border-[1px] hover:bg-gray-100 border-gray-200 rounded-lg lg:my-0  md:w-full lg:w-[500px] lg:p-2">
            <h1>Recent posts</h1>
            @foreach ($recentPosts as $post)
            <x-post.recent-post :$post />
            @endforeach
        </div>

    </div>

    @empty
    <div class="my-10 text-2xl font-semibold text-center">
        <h1>
            No records found.
        </h1>
    </div>
    @endforelse

    {{-- most recent posts --}}
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5">

        @foreach ($posts->skip(1) as $post )

        <x-post.posts :$post />

        @endforeach
    </div>
</div>
<div class="my-5 px-5 md:px-10">
    {{ $posts->links() }}
</div>
@include('layouts.footer')
@endsection