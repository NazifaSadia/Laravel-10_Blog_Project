<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
// To get the info of logged in User
use Illuminate\Support\Facades\Auth;
use File;

class AdminController extends Controller
{

     public function post_page()
    {
        return view('admin.post_page');
    }
     public function add_post(Request $request)
    {
        $user = Auth()->user();

        $user_id    = $user->id;
        $name       = $user->name;
        $user_type  = $user->name;
        //////////////////////////////

        $post = new Post;

        $post->title        =   $request->title;
        $post->description  =   $request->description;
        $post->post_status  =   'active';

        $post->user_id      = $user_id;
        $post->name         = $name;
        $post->user_type    = $user_type;

        $image = $request->image;

        if( $image )
        {
          $image_name = time().'.'.$image->getClientOriginalExtension();
          $request->image->move('postimage',$image_name);
          $post->image = $image_name;
        }
        
        $post->save();
        return redirect()->back()->with('message', 'Post Added Successfully!!');
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show_post()
    {
      $posts = Post::All();
        return view('admin.show_post', compact('posts'));
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
        $post = Post::find($id);

        return view('admin.edit',compact('post'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);

        $post->delete();

        return redirect()->back()->with('message','Post Deleted Successfully!');
    }
}
