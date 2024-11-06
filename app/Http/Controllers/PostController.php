<?php

namespace App\Http\Controllers;

use App\Models\Post;

use App\Http\Requests\UpdatePostRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
       

       $request->validate([
            "Title"=>["required","max:255"],
            "Body"=>["required"],
            "Date"=>['required'],
            'Time_Found'=>['required'],
            'Location'=>['required'],
            'image'=>['nullable','file','max:3000','mimes:webp,png,jpeg,jpg'],
        ]);
        $path=null;
        if ($request->hasFile('image')){
            $path=Storage::disk('public')->put("losts_images",$request->image);

        }
        

        // Post::create( ['user_id'=>Auth::id(),...$fields]);
        Auth::User()->posts()->create(
        [
            "Title"=>$request->Title,
            "Body"=>$request->Body,
            "Date"=>$request->Date,
            "Time_Found"=>$request->Time_Found,
            "Location"=>$request->Location,
            'image'=>$path,
        ]
    );

        return redirect()->route('post.index')->with('success','Post created successfully'); 
    }
  
    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //

    if (auth()->user()->id !== $post->user_id){
        $post->increment('views');
        $post->refresh();
      }
       
        

        return view('post-overview', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        // Increment the views counter
      

        return view('edit-post',['post' => $post]);
    }
    public function search(Request $request)
    {
        $query = $request->input('query');

        // Check if query is provided
        if ($query) {
            // Use the query to search for posts by title
            $posts = Post::where('Title', 'LIKE', '%' . $query . '%')->get();
        } else {
            // If no query, return an empty collection
            $posts = collect();
        }

        return view('search', compact('posts', 'query'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
        $fields=$request->validate([
            "Title"=>["required","max:255"],
            "Body"=>["required"],
            "Date"=>['required'],
            'Time_Found'=>['required'],
            'Location'=>['required'],
            'image'=>['nullable','file','max:3000','mimes:webp,png,jpeg,jpg'],
        ]);
       
    
    // Check if a new image was uploaded
    if ($request->hasFile('image')) {
        // Delete the old image if it exists
        if ($post->image) {
            $image_path=public_path('storage/'.$post->image);
            if (file_exists($image_path)){
                unlink($image_path);
            }
        }

        // Store the new image
        $imagePath = $request->file('image')->store('losts_images', 'public');
        $post->image = $imagePath; // Update the post's image path
    }
        

         // Update other post fields
        $post->Title = $request->input('Title');
        $post->Body = $request->input('Body');
        $post->Date = $request->input('Date');
        $post->Time_Found = $request->input('Time_Found');
        $post->Location = $request->input('Location');
        $post->save(); // Save the updated post

        return back()->with('success','Post edited successfully'); 

    }

    /**
     * Remove the specified resource from storage.
     */
   

    public function destroy(Post $post)
    {
        if ($post->image) {
            $image_path=public_path('storage/'.$post->image);
            if (file_exists($image_path)){
                unlink($image_path);
            }
        }
        $post->delete();
        
        return back()->with("delete",'Your post was delete !');
    }

    
    public function destroy2(Post $post)
    {
       
        
        if ($post->image) {
            $image_path=public_path('storage/'.$post->image);
            if (file_exists($image_path)){
                unlink($image_path);
            }
        }
    
        $post->delete();
        
        return redirect()->route('post.index');
    }
}
