{{-- session msgs --}}
@if(session('msg'))
<div class="flex justify-end fixed bottom-5 right-5">
    <h1 class="bg-blue-600 text-white rounded-lg shadow-md px-3 py-2    ">
        {{ session('msg') }}
    </h1>
</div>
@endif