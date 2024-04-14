@extends('layouts.admin-layout')
@section('content')
<div class="px-12 my-5">
    <h2 class="text-xl text-center font-semibold leading-normal my-3 text-gray-800 ">
        Update Category
    </h2>
    <div class="">
        <div class="max-w-3xl mx-auto bg-slate-100 py-5 rounded-lg shadow-4xl ">
            <div class="max-w-2xl mx-auto">
                <form action="{{ route('categories.update', $category->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <x-form.input :post="$category" field="category" type="text" />
                    
                    <div class="mt-5 flex justify-between md:justify-start md:space-x-5">
                        <button class="bg-blue-500 rounded-full px-14 py-2 text-white hover:bg-blue-600" type="submit">
                            Update
                        </button>
                        <a class="rounded-full px-14 py-2  border border-yellow-400 hover:bg-yellow-400 hover:text-white"
                            href="/admin/posts">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection