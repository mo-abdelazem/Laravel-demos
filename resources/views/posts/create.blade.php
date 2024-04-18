@extends('layouts.app')

@section('content')
<form action="/posts" method="POST">
    @csrf
    <div class="mb-3">
        <label for="postName" class="form-label">Post Name</label>
        <input type="text" class="form-control" id="postName" name="name">
    </div>
    <div class="mb-3">
        <label for="postDescription" class="form-label">Description</label>
        <textarea class="form-control" id="postDescription" name="description"></textarea>
    </div>
    <div class="mb-3">
        <label for="postImage" class="form-label">Image URL</label>
        <input type="text" class="form-control" id="postImage" name="image">
    </div>
    <div class="mb-3">
        <label for="postCategory" class="form-label">Category</label>
        <input type="text" class="form-control" id="postCategory" name="category">
    </div>
    <div class="mb-3">
        <label for="postAuthor" class="form-label">Author</label>
        <input type="text" class="form-control" id="postAuthor" name="author">
    </div>
    <button type="submit" class="btn btn-success">Create</button>
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