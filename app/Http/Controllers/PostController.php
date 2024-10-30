<?php

namespace App\Http\Controllers;

use App\Models\Post;

use App\Http\Requests\UpdatePostRequest;
use App\Models\User;
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

    // public function PostOverview(User $user) {
    //     $userPosts = $user->posts; // Retrieves posts for the specified user
    //     return view("post-overview", ['posts' => $userPosts]); // Passes posts to view
    // }

   public function MyPost()
    {
    $posts = Post::with('user')->where('user_id', Auth::id())->latest()->get();
    return view("my-post", ['posts' => $posts]);
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
        return view('post-overview', ['post' => $post]);
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
        $post->delete();
        
        return back()->with("delete",'Your post was delete !');
    }
}
