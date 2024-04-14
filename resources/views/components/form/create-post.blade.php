<div class="px-12 my-5">
    <h2 class="text-xl text-center font-semibold leading-normal my-3 text-gray-800 ">
        Add New Post
    </h2>
    <div class="">
        <div class="max-w-3xl mx-auto bg-gray-50 py-5 rounded-lg shadow-4xl ">
            <div class="max-w-2xl mx-auto">
                <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <x-form.input field="title" type="text" />
                    <x-form.input field="excerpt" type="text" />
                    <x-form.input field="description" type="text" />


                    <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-lg mt-3">
                        <select class="rounded-lg w-full" name="category"
                            class="flex-1 py-2 pl-3 pr-9 text-sm font-semibold">
                            <option value="" hidden>Category</option>
                            @foreach ($categories as $category)
                            <option class="text-lg" value="{{ $category->id }}">
                                {{ $category->category }}
                            </option>
                            @endforeach
                        </select>

                        <svg class="transform -rotate-90 absolute pointer-events-none" style="right: 12px;" width="22"
                            height="22" viewBox="0 0 22 22">
                            <g fill="none" fill-rule="evenodd">
                                <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                                </path>
                                {{-- <path fill="#222"
                                    d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z"></path>
                                --}}
                            </g>
                        </svg>
                    </div>
                    <p class="text-red-500">
                        @error('category')
                        {{ $message }}
                        @enderror
                    </p>

                    <x-form.input field="image" type="file" />

                    <div class="mt-5 flex justify-between md:justify-start md:space-x-5">
                        <button class="bg-blue-500 rounded-full px-14 py-2 text-white hover:bg-blue-600" type="submit">
                            Publish
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