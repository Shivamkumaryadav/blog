@extends('layouts.admin-layout')
@section('content')
<div class="flex justify-between px-5 my-5">
    <h1 class="text-gray-800 font-semibold">
        Categories
    </h1>
    <div>
        <!-- add new post button -->
        <a class="text-white rounded-lg shadow-lg px-4 py-2 bg-blue-600 hover:bg-blue-700"
            href="{{ route('categories.create') }}">
            Add New Category
        </a>
    </div>
</div>
@if($categories->total() > 0)
<div class="rounded-lg border border-gray-200 shadow-md m-5 h-11/12 mt-10 overflow-auto max-h-[400px]">
    <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Sr no</th>
                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Category Name</th>
                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Related Post</th>
                <th colspan="2" scope="col" class="px-6 py-4 font-medium text-gray-900 text-center">Action</th>
            </tr>
        </thead>
        @foreach ($categories as $index => $category )
        <tbody class="divide-y divide-gray-100 border-t border-gray-100">
            <tr class="hover:bg-gray-50">
                <td class="px-6 py-4">
                    {{ $loop->index + 1 }}
                </td>

                <td class="px-6 py-4">
                    {{ $category->category }}
                </td>

                <td class="px-6 py-4">
                    {{ count($category->posts) }}
                </td>

                <td class="px-6 py-4">
                    <div class="flex justify-center gap-4">
                        <a href="{{ route('categories.edit', $category->id) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="h-6 w-6" x-tooltip="tooltip">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                            </svg>
                        </a>

                        <form action="{{ route('categories.destroy', $category->id)}}" method="POST">
                            @csrf
                            @method("DELETE")
                            <button type="submit">

                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="h-6 w-6" x-tooltip="tooltip">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                </svg>
                            </button>
                        </form>
                    </div>

                </td>

            </tr>

        </tbody>

        @endforeach
    </table>
</div>
<div class="px-5 ">
    {{ $categories->links() }}
</div>
@else
<div class="grid place-items-center h-[90vh] text-xl font-semibold">
    No messages are available
</div>
@endif
@endsection