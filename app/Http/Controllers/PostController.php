<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //sharing all the posts 
        return response()->json([
            'posts'=>post::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //controller for storing new post using api 
        $post = new Post;
        $post->title = $request->title;
        $post->description = $request->description;

        $post->save();

        return response()->json([
            'massage' => 'Post Created',
            'status' => 'success',
            'data' => $post
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(post $post)
    {
        //showing single post 
        return response()->json(['post'=>$post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, post $post)
    {
        //controller for update existing post
        $post = new Post;
        $post->title = $request->title;
        $post->description = $request->description;

        $post->save();

        return response()->json([
            'massage' => 'Post Updated',
            'status' => 'success',
            'data' => $post
        ]);

        // note: Postman থেকে update করতে http://127.0.0.1:8000/api/posts/1?_method=PUT , POST করতে হয়, কেননা এটা postman এর একটা Limitation
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(post $post)
    {
        //for deleting post 
        $post->delete();
        return response()->json([
            'massage'=>'post deleted',
            'status'=>'success'
        ]);
    }
}
