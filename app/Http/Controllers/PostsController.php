<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class PostsController extends Controller
{
    public function index()
    {
        $posts = [
            ['id' => 1, 'name' => 'Post 1'],
            ['id' => 2, 'name' => 'Post 2'],
        ];
        return view('posts.index', ['posts' => $posts]);
    }
    public function create()
    {

        return view('posts.create');
    }

    public function store(Request $request)
    {

        return redirect('/posts');
    }
    public function show($id)
    {
        $post = [
            'id' => $id, 'name' => 'Post 1'
        ];
        return view('posts.show', ['post' => $post]);
    }
    public function edit($id)
    {
        $post = [
            'id' => $id, 'name' => 'Post 1'
        ];
        return view('posts.edit', ['post' => $post]);
    }

    public function update($id, Request $request)
    {

        return redirect('/posts');
    }

    public function destroy($id)
    {

        return redirect('/posts');
    }
}
