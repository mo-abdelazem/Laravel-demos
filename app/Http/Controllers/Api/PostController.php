<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Resources\PostResource;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::paginate(5);

        return PostResource::collection($posts);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpg,png,jpeg|max:2048',
            'category' => 'required|string',
            'author' => 'required|string',
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        $post = new Post();
        $post->name = $request->name;
        $post->description = $request->description;
        $post->user_id = $request->user_id;
        $post->image = $imageName;
        $post->author = $request->author;
        $post->category = $request->category;
        $post->slug = $request->slug;
        $post->save();

        return new PostResource($post);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::find($id);

        if (!$post) {
            return response()->json(['error' => 'Post not found'], 404);
        }
        return new PostResource($post);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Post::findOrFail($id);

        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'category' => 'required|string',
            'author' => 'required|string',
        ]);

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
        $post->author = $request->author;
        $post->category = $request->category;
        $post->save();

        return response()->json(['message' => 'Post updated successfully'], 200);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        if ($post->image) {
            $imagePath = public_path('images/' . $post->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        $post->delete();
        return response()->json(['message' => 'Post deleted successfully']);
    }
}