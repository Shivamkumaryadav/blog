@extends('layouts.admin-layout')

@section('content')
<div class="p-5">
   <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4">
    <div class="bg-white rounded-lg shadow-md h-52 ">
        <h1 class="text-center my-3 font-semibold">Total Users</h1>
        <h1 class="text-center my-3 font-semibold">
            {{ $users }}
        </h1>
        <div class="mt-20 text-center">
            <a href="{{url('profile')}}" class="px-3 py-2 bg-violet-500 text-white rounded-md hover:bg-violet-600">
                View Your Profile
            </a>
        </div>
    </div>
    <div class="bg-white rounded-lg shadow-md h-52 ">
        <h1 class="text-center my-3 font-semibold">Total Posts</h1>
        <h1 class="text-center my-3 font-semibold">
           {{ $posts }}
        </h1>
        <div class="mt-20 text-center">
            <a href="{{ url('admin/posts') }}" class="px-3 py-2 bg-violet-500 text-white rounded-md hover:bg-violet-600">
                View Posts
            </a>
        </div>
    </div>
    <div class="bg-white rounded-lg shadow-md h-52 ">
        <h1 class="text-center my-3 font-semibold">Total Categories</h1>
        <h1 class="text-center my-3 font-semibold">
            {{ $categories }}
        </h1>
        <div class="mt-20 text-center">
            <a href="{{ url('admin/categories') }}" class="px-3 py-2 bg-violet-500 text-white rounded-md hover:bg-violet-600">
                View Categories
            </a>
        </div>
    </div>

</div>
</div>

@endsection
