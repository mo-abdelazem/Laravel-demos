@extends('layouts.app')

@section('title', 'Posts')
@section('content')
<div class="d-flex justify-content-between align-items-center">
    <h1 class="mb-4">Posts</h1>
    <a href="/posts/create" class="btn btn-success mt-3">Create New Post</a>
</div>

<ul class="list-group">
    @foreach ($posts as $post)
    <li
        class="list-group-item d-flex justify-content-between align-items-center bg-dark border border-white-50 text-light">
        {{ $post['name'] }}
        |
        {{ $post->user->name }}
        <div class="btn-group" role="group">
            <a href="/posts/{{ $post['id'] }}" class="btn btn-info mx-2 btn-sm">View</a>
            <a href="/posts/{{ $post['id'] }}/edit" class="btn btn-primary mx-2 btn-sm">Edit</a>
            <form method="POST" action="/posts/{{ $post['id'] }}" style="display:inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
            </form>
        </div>
    </li>
    @endforeach
</ul>
{{ $posts->links() }}

@endsection