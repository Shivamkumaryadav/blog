{{-- reply input --}}
@props(['comment'])
<div id="reply-section"
    class="hidden fixed w-full flex md:justify-center bottom-0 z-30 md:px-3">
    <div class="bg-[#1C3B63] w-11/12 md:w-[800px] py-2 rounded-t-lg">
        <x-form.textarea type="text" :$comment field="reply" />
        {{-- <div class="w-full px-3 h-[1px] bg-slate-200"></div> --}}
        <form action="" method="POST">
            @csrf
            <div class="flex justify-between md:justify-end items-center gap-16 px-3 my-3">
                <span id="reply-cancel"
                    class="font-semibold border text-white border-yellow-500 rounded-full px-8 md:px-16 hover:text-white py-2 hover:cursor-pointer hover:bg-yellow-500">
                    Cancel
                </span>
                <button type="submit"
                    class="font-semibold bg-blue-500 rounded-full px-8 md:px-16 text-white py-2 hover:bg-blue-600">
                    Post
                </button>
            </div>
        </form>
    </div>
</div>