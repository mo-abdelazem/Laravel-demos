<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Show Post</title>
</head>

<body class="bg-dark text-light">
    <div class="container mt-4">
        <h1>Show Post</h1>
        <div class="card bg-dark border-white-50 text-light">
            <div class="card-body">
                <h5 class="card-title">Post Details</h5>

                <p class="card-text">User name: {{ $post->user->name }}
                </p>
                <p class="card-text">ID: {{ $post->id }}</p>
                <p class="card-text">Name: {{ $post->name }}</p>
                <p class="card-text">Description: {{ $post->description }}</p>
                <p class="card-text">Image: {{ $post->image }}</p>
                <p class="card-text">Category: {{ $post->category }}</p>
                <p class="card-text">Author: {{ $post->author }}</p>
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
    </div>
</body>

</html>