<?php

use Illuminate\Support\Facades\Route;

$posts = [
    ['id' => 1, 'name' => 'Post 1'],
    ['id' => 2, 'name' => 'Post 2'],
];

Route::get('/', function () use ($posts) {
    return view('home', ['posts' => $posts]);
});

// Show all posts
Route::get('/posts', function () use ($posts) {
    return view('home', ['posts' => $posts]);
});

// Show a form for creating a new post
Route::get('/posts/create', function () {
    return view('create');
});

// Store a new post
Route::post('/posts', function (\Illuminate\Http\Request $request) use (&$posts) {
    $id = count($posts) + 1;
    $newPost = ['id' => $id, 'name' => $request->input('name')];
    $posts[] = $newPost;
    echo "Post created successfully!";
});

// Show a single post
Route::get('/posts/{id}', function ($id) use ($posts) {
    $post = collect($posts)->firstWhere('id', $id);
    return view('show', ['post' => $post]);
});

// Show a form for editing a post
Route::get('/posts/{id}/edit', function ($id) use ($posts) {
    $post = collect($posts)->firstWhere('id', $id);
    return view('edit', ['post' => $post]);
});

// Update a post
Route::put('/posts/{id}', function ($id, \Illuminate\Http\Request $request) use (&$posts) {
    $index = collect($posts)->search(function ($post) use ($id) {
        return $post['id'] == $id;
    });

    if ($index !== false) {
        $posts[$index]['name'] = $request->input('name');
        echo "Post updated successfully!";
    } else {
        echo "Post not found!";
    }
});

// Delete a post
Route::delete('/posts/{id}', function ($id) use (&$posts) {
    $index = collect($posts)->search(function ($post) use ($id) {
        return $post['id'] == $id;
    });

    if ($index !== false) {
        array_splice($posts, $index, 1);
        echo "Post deleted successfully!";
    } else {
        echo "Post not found!";
    }
});
