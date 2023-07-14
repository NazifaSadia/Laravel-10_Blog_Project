<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

use Alert;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if( Auth::id() )
        {
            $posts = Post::all();

            $usertype = Auth()->user()->user_type;

            if( $usertype == 'user' )
            {
                return view('frontend.homepage', compact('posts'));
            }
            else if( $usertype == 'admin' )
            {
                return view('admin.adminhome');
            }
            else{
                return redirect()->back();
            }
        }
    }


    public function homepage()
    {
        $posts = Post::all();

        return view('frontend.homepage', compact('posts'));
    }

    public function post_details( $id )
    {
        $post = Post::find($id);

        return view('frontend.post_details', compact('post') );
    }
    

    /**
     * Show the form for creating a new resource.
     * User - Create Post
     */
    public function create()
    {
        return view('frontend.userpost.create_post');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth()->user();

        $user_id    = $user->id;
        $name       = $user->name;
        $user_type  = $user->user_type;
        //////////////////////////////

        $post = new Post();

        $post->title        =   $request->title;
        $post->description  =   $request->description;
        $post->post_status  =   'pending';

        $post->user_id      = $user_id;
        $post->name         = $name;
        $post->user_type    = $user_type;

        $image = $request->image;

        if( $image )
        {
          $image_name = time().'.'.$image->getClientOriginalExtension();
          $request->image->move('backend/img/post/',$image_name);
          $post->image = $image_name;
        }
        
        $post->save();

        Alert::success('Congrats','Your data has been Added Successfully.');

        return redirect()->back();
    }

    public function my_post()
    {
        $user = Auth()->user();

        $user_id    = $user->id;

        $posts = Post::where('user_id', '=', $user_id)->get();

        return view('frontend.userpost.my_post', compact('posts'));
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }
 

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::find($id);

        return view('frontend.userpost.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Post::find($id);

        $post->title        =   $request->title;
        $post->description  =   $request->description;

        $image = $request->image;

        if( $image )
        {
          $image_name = time().'.'.$image->getClientOriginalExtension();
          $request->image->move('backend/img/post/',$image_name);
          $post->image = $image_name;
        }

        $post->save();
        return redirect()->route('userpost.my_post')->with('message','Post Updated Successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);

        $post->delete();

        return redirect()->back()->with('message', 'Post Deleted Successfully.');
    }
}
