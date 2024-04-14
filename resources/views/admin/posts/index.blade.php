@extends('layouts.admin-layout')
@section('content')

@if($posts->total() > 0)
<div class="">
    <div class="flex justify-between px-5 my-5">
        <h1 class="text-gray-800 font-semibold">
            Posts
        </h1>
        <div>
            <!-- add new post button -->
            <a class="text-white rounded-lg shadow-lg px-4 py-2 bg-blue-600 hover:bg-blue-700 "
                href="/admin/posts/create">
                Add New Post
            </a>
        </div>
    </div>

    {{-- posts table --}}
    <x-admin.post-table :$posts />
    <div class="px-5 ">
        {{ $posts->links() }}
    </div>

</div>
@else
<div class="grid place-items-center h-[90vh] text-xl font-semibold">
    No messages are available
</div>
@endif
@endsection