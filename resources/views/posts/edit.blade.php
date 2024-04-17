<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Edit Post</title>
</head>

<body class="bg-dark text-light">
    <div class="container mt-4">
        <h1>Edit Post</h1>
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
                <input type="text" class="form-control bg-dark border-white-50 text-light" id="postCategory"
                    name="category" value="{{ $post->category }}">
            </div>
            <div class="mb-3">
                <label for="postAuthor" class="form-label">Author</label>
                <input type="text" class="form-control bg-dark border-white-50 text-light" id="postAuthor" name="author"
                    value="{{ $post->author }}">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>

</html>