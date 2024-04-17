<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Posts</title>
</head>

<body class="bg-dark text-light">
    <nav class="navbar navbar-expand-md navbar-dark bg-dark border-bottom border-white-50">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pricing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-4">
        <h1 class="mb-4">Posts</h1>
        <ul class="list-group">
            @foreach ($posts as $post)
            <li class="list-group-item d-flex justify-content-between align-items-center bg-dark border border-white-50 text-light">
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
        <a href="/posts/create" class="btn btn-success mt-3">Create New Post</a>
    </div>
</body>

</html>