@props(['field', 'post'])
<div class="w-full px-4 md:px-10">
    <div class="md:w-1/2 border border-gray-300 p-2 rounded-xl">
        <form action="{{ route('comment', $post->id) }}" method="POST">
            @csrf
            <label class="capitalize font-medium" for="comment">Comment</label>
            <div class="flex w-full h-[0.1rem] bg-gray-300"></div>
            <textarea style="resize: none;" class="w-full  h-32  font-medium border-none focus:border-none focus:ring-0"
                placeholder="Want to participate?" name="comment"></textarea>
            <x-form.errors field="comment" />
            <div class="flex w-full h-[1px] bg-gray-300 mt-2"></div>
            <div class=" flex justify-end my-4">
                <button class="w-full md:w-auto  bg-blue-600 text-white font-semibold px-10 py-2 rounded-full shadow-xl hover:bg-blue-700"
                    type="submit">
                    Post
                </button>
            </div>
        </form>
    </div>
</div>