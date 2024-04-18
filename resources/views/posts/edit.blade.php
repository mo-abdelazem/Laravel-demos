@extends('layouts.app')

@section('content')
<form action="/posts/{{ $post->id }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3" bs-data-theme="dark">
        <label for="postName" class="form-label">Post Name</label>
        <input type="text" class="form-control bg-dark border-white-50 text-light" id="postName" name="name"
            value="{{ $post->name }}">
    </div>
    <div class="mb-3">
        <label for="postDescription" class="form-label">Description</label>
        <textarea class="form-control bg-dark border-white-50 text-light" id="postDescription"
            name="description">{{ $post->description }}</textarea>
    </div>
    <div class="mb-3">
        <label for="postImage" class="form-label">Image URL</label>
        <input type="text" class="form-control bg-dark border-white-50 text-light" id="postImage" name="image"
            value="{{ $post->image }}">
    </div>
    <div class="mb-3">
        <label for="postCategory" class="form-label">Category</label>
        <input type="text" class="form-control bg-dark border-white-50 text-light" id="postCategory" name="category"
            value="{{ $post->category }}">
    </div>
    <div class="mb-3">
        <label for="postAuthor" class="form-label">Author</label>
        <input type="text" class="form-control bg-dark border-white-50 text-light" id="postAuthor" name="author"
            value="{{ $post->author }}">
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@endsection