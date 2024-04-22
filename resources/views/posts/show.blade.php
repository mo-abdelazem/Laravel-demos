    @extends('layouts.app')


    @section('content')
    <div class="card bg-dark border-white-50 text-light">
        <img src="{{ asset('images/' . $post->image) }}" width="300px" alt="" srcset="">
        <div class="card-body">
            <p class="card-text">Posted By: {{ $post->user->name }}</p>
            <p class="card-text">Name: {{ $post->name }}</p>
            <p class="card-text">Slug: {{ $post->slug }}</p>
            <p class="card-text">Description: {{ $post->description }}</p>
            <p class="card-text">Image: {{ $post->image }}</p>
            <p class="card-text">Category: {{ $post->category }}</p>
            <p class="card-text">Author: {{ $post->author }}</p>

            <h5 class="mt-4">Comments</h5>
            <ul class="list-group ">
                @if ($post->comments->isEmpty())
                <li class="list-group-item bg-dark border-white-50 text-light">No comments</li>
                @endif
                @if ($post->comments->count() > 0)
                @foreach ($post->comments as $comment)
                <li class="list-group-item bg-dark border-white-50 text-light">{{ $comment->body }}</li>
                @endforeach
                @endif
            </ul>
            <form method="POST" action="/comments">
                @csrf
                <input type="hidden" name="post_id" value="{{ $post->id }}">
                <div class="form-group mt-3">
                    <label for="commentBody" class="form-label">Add a comment:</label>
                    <textarea class="form-control bg-dark text-light my-2" id="commentBody" name="body" rows="2"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
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