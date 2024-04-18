@extends('layouts.app')


@section('content')
<div class="card bg-dark border-white-50 text-light">
    <img src="{{ $post->image }}" width="300px" alt="" srcset="">
    <div class="card-body">
        <p class="card-text">Posted By: {{ $post->user->name }}</p>
        <p class="card-text">Name: {{ $post->name }}</p>
        <p class="card-text">Description: {{ $post->description }}</p>
        <p class="card-text">Image: {{ $post->image }}</p>
        <p class="card-text">Category: {{ $post->category }}</p>
        <p class="card-text">Author: {{ $post->author }}</p>

        <h5 class="mt-4">Comments</h5>
        <ul class="list-group ">
            @if ($comments->isEmpty())
            <li class="list-group-item bg-dark border-white-50 text-light">No comments</li>
            @endif
            @if ($comments->count() > 0)
            @foreach ($comments as $comment)
            <li class="list-group-item bg-dark border-white-50 text-light">{{ $comment->body }}</li>
            @endforeach
            @endif
        </ul>

    </div>
</div>
<div class="mt-3">
    <a href="/posts/{{ $post->id }}/edit" class="btn btn-primary">Edit</a>
    <form method="POST" action="/posts/{{ $post->id }}" style="display: inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
</div>
@endsection