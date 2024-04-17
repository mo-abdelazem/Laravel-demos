<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Create Post</title>
</head>

<body class="bg-dark text-light">
    <div class="container mt-4">
        <h1>Create Post</h1>
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
    </div>
</body>

</html>