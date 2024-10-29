<?php

namespace App\Http\Controllers;

use App\Models\Post;

use App\Http\Requests\UpdatePostRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts=Post::latest()->get();
        return view("dashboard",['posts'=>$posts]);
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
        //
      
        $fields=$request->validate([
            "Title"=>["required","max:255"],
            "Body"=>["required"],
        ]);
        // Post::create( ['user_id'=>Auth::id(),...$fields]);
        Auth::User()->posts()->create($fields);

        return back()->with('success','Post created successfully'); 
    }
  
    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
