@extends('layouts.home')
@section('content')
{{-- particular post --}}
<x-post.post-details :$post />

{{-- only authenticated user can comment (form section)--}}
@auth
<x-post.comment-form field="comment" :post="$post" />
@endauth

{{-- show if user is not authenticated --}}
@guest
<div class="px-5 md:px-10">
    <p>
        Please <a class="text-blue-500 font-semibold hover:underline" href="/login">login</a>
        or
        <a class="text-blue-500 font-semibold hover:underline" href="/register">create an account</a>
        to comment on this post.

    </p>
</div>
@endguest


{{-- comments --}}
<div class="my-5 px-5 md:px-10 ">
    @forelse($comments as $comment)

    <x-post.comment-card :comment="$comment" :post="$post" />
    
    @empty
    <h1 class="text-lg font-semibold text-center">No Comments yet</h1>
    @endforelse
</div>

@include('layouts.footer')
@endsection