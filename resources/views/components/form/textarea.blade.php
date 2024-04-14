@props(['field', 'comment'])

<div class="mb-2 px-3 w-full md:w-[780px] h-64">
    <div class="flex items-center text-white">
        @if($comment ?? null)
            <svg data-v-2836fdb5-s="" height="16px" viewBox="0 0 16 16" width="16px" class="mr-2 fill-current text-grey-800">
                <g data-v-2836fdb5-s="" fill="none" fill-rule="evenodd" stroke="none" stroke-width="1">
                    <g data-v-2836fdb5-s="" id="Group" class="fill-current" transform="translate(0.000000, -336.000000)">
                        <path data-v-2836fdb5-s=""
                            d="M0,344 L6,339 L6,342 C10.5,342 14,343 16,348 C13,345.5 10,345 6,346 L6,349 L0,344 L0,344 Z M0,344">
                        </path>
                    </g>
                </g>
            </svg>
        @endif
        <label class="capitalize text-white font-semibold" for="title">{{ $field }}</label>
    </div>
    <textarea placeholder="What's on your mind?" required style="resize: none;border-left : none; border-right : none;"
        class="bg-[#1C3B63] text-white font-semibold text-sm w-full  h-48 pt-2 px-3  border border-black focus:ring-0 focus:border-black"
        name="{{ $field }}" value="{{old($field, optional($comment)->$field ?? '') }}"></textarea>

    <p class="text-red-500">
        @error($field)
        {{ $message }}
        @enderror
    </p>
</div>