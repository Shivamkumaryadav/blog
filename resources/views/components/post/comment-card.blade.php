 @props(['comment', 'post'])

 <div class="relative w-full  gap-5 px-1 bg-slate-200 rounded-lg py-2 my-4 md:px-10 hover:bg-slate-300">
        <div class="relative flex items-center px-5 md:px-0 md:flex space-x-12 ">
            <img class="bg-gray-400 rounded-full w-[80px] h-20 scale-90 hover:scale-100"
                src="https://www.gravatar.com/avatar/c6525dfcb8f0758b9ae85d85130dc60c?s=100&d=https%3A%2F%2Fs3.amazonaws.com%2Flaracasts%2Fimages%2Fforum%2Favatars%2Fdefault-avatar-13.png"
                alt="ssj">
            <div class=" flex flex-col">
                <div>
                    <h1 class="capitalize font-semibold">
                        {{ $comment->user->name }}
                    </h1>
                </div>
                <p class="text-xs">
                    {{ $comment->created_at->diffForHumans() }}
                </p>
            </div>

        </div>
        <div class="px-5 md:pl-32">
            <p class="py-3">
                {{ $comment->comment }}
            </p>
        </div>

        <!-- showing enabling the comment delete button for the users belongs to the comments -->

        <div class="flex justify-end  px-8 my-0 md:px-4">

            {{-- show to only auth user and  the comment belongs to particular users  --}}
            @auth
            @if($comment->user->id === auth()->user()->id)
            <div>
                <form action="{{ route('comment.delete', ['post' => $post-> id, 'comment' => $comment->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class=" text-red-500">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                        </svg>
                    </button>
                </form>
            </div>
            @endif
            @endauth
        </div>

        <!-- end delete comment authorization -->
    </div>