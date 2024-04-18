<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use App\Models\Post;
use Illuminate\Http\Request;


class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

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
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' =>  'required|image|mimes:jpg,png,jpeg|max:2048'
        ]);
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
    public function show($id)
    {
        $post = Post::findOrFail($id);
        $postCreatorId = $post->user_id;

        $comments = Comments::where('post_id', $post->id)
            ->where('user_id', $postCreatorId)
            ->get();

        return view('posts.show', ['post' => $post, 'comments' => $comments]);
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit', ['post' => $post]);
    }


    public function update($id, Request $request)
    {
        $post = Post::findOrFail($id);
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
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