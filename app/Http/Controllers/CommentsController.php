<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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


    /**
     * Display the specified resource.
     */
    public function store(Request $request)
    {
        $request->validate([
            'post_id' => 'required|exists:posts,id', // Make sure the post exists
            'body' => 'required',
        ]);

        $comment = new Comments();
        $comment->post_id = $request->post_id;
        $comment->body = $request->body;
        $comment->user_id = auth()->id();
        $comment->save();

        return redirect()->route('posts.show', $comment->post_id);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comments $comments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comments $comments)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comments $comments)
    {
        //
    }
}