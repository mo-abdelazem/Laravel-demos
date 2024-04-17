<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;


class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', ['posts' => $posts]);
    }
    public function create()
    {

        return view('posts.create');
    }

    public function store(Request $request)
    {
        $postData = [
            'user_id' => auth()->user()->id,
            'name' => $request->name,
            'description' => $request->description,
            'image' => $request->image,
            'category' => $request->category,
            'author' => $request->author,
        ];
        Post::create($postData);

        return redirect('/posts');
    }
    public function show($id, Post $postModel)
    {
        $post = $postModel->findOrFail($id);
        return view('posts.show', ['post' => $post]);
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit', ['post' => $post]);
    }


    public function update($id, Request $request)
    {
        $post = Post::findOrFail($id);

        $postData = [
            'name' => $request->name,
            'description' => $request->description,
            'image' => $request->image,
            'category' => $request->category,
            'author' => $request->author,
        ];

        $post->update($postData);

        return redirect('/posts');
    }


    public function destroy($id)
    {

        Post::destroy($id);
        return redirect('/posts');
    }
}
