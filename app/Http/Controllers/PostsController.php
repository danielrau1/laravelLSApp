<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// ***** using the Post model - this allows us to use the eloquent style because Post extends Model where it is inbuilt **** //
use App\Post;

use DB; // in order to use normal sql queries

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // the index method is called immediately when go to the posts url
        //return Post::all(); // will return all the posts in json format

        //$posts = Post::all(); // fetch the json containing all the posts and put it into the $posts variable
        //$post = Post::where('title','Post 1')->get();
        //$posts = DB::select('SELECT * FROM posts'); // Using the normal sql querries
       // $posts = Post::orderBy('title','asc')->take(1)->get(); //limit how many you want
        //$posts = Post::orderBy('title','asc')->get(); // get all posts and order by title ascending

        $posts = Post::orderBy('title','asc')->paginate(1); //paginate
        return view('posts/index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //DR: NOTE THAT THIS METHOD WASN'T EXPLICITLY CALLED, SO IT WORKS "AUTOMATICALLY"
    public function show($id)
    {
        //when click on a post will go to a url of that post alone
       $post = Post::find($id); //if return as is on the new page will have the json containing the post with the specific id
        return view('posts/show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
