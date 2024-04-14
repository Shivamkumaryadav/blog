@props(['field','type', 'post'])

<div class="mb-2">
    <label class="capitalize" for="title">{{ $field }}</label>
    <input class="w-full py-2 px-3 rounded-lg border border-black" type="{{ $type }}"
        name="{{ $field }}" value="{{old($field, optional($post)->$field ?? '') }}">
    <p class="text-red-500">
        @error($field)
        {{ $message }}
        @enderror
    </p>
</div>