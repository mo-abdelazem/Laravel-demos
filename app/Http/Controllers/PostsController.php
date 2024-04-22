<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;


class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $posts = Post::paginate(8);
        return view('posts.index', ['posts' => $posts]);
    }
    public function create()
    {
        $authors = User::all();
        return view('posts.create', ['authors' => $authors]);
    }
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'user_id' => 'required', // Make sure user_id is required
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg|max:2048',
            'category' => 'required',
            'author' => 'required',
        ]);
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        $post->name = $request->name;
        $post->description = $request->description;
        $post->user_id = auth()->id();
        $post->image = $imageName;
        $post->author = $request->author;
        $post->category = $request->category;
        $post->slug = $request->slug;
        $post->save();
        return redirect('/posts');
    }
    public function show($id)
    {
        $post = Post::with('comments')->findOrFail($id);
        return view('posts.show', ['post' => $post]);
    }


    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $authors = User::all();
        return view('posts.edit', ['post' => $post, 'authors' => $authors]);
    }
    public function update($id, Request $request)
    {
        $post = Post::findOrFail($id);

        $rules = [
            'name' => 'required|min:3|unique:posts,name,' . $id,
            'description' => 'required|min:10',
            'category' => 'required',
            'author' => 'required',
            'image' => 'image|mimes:jpg,png,jpeg|max:2048',
        ];

        if ($request->hasFile('image')) {
            $rules['image'] = 'required|image|mimes:jpg,png,jpeg|max:2048';
        }

        $request->validate($rules);

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);

            if ($post->image && file_exists(public_path('images/' . $post->image))) {
                unlink(public_path('images/' . $post->image));
            }

            $post->image = $imageName;
        }

        $post->name = $request->name;
        $post->description = $request->description;
        $post->category = $request->category;
        $post->author = $request->author;

        $post->save();

        return redirect('/posts');
    }



    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        if ($post->image) {
            $imagePath = public_path('images/' . $post->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        $post->delete();

        return redirect('/posts');
    }
}
