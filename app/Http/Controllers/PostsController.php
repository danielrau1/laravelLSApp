<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// ***** using the Post model - this allows us to use the eloquent style because Post extends Model where it is inbuilt **** //
use App\Post;

use DB; // in order to use normal sql queries

class PostsController extends Controller
{

//(12) to construct that copied from the HomeController
    public function __construct()
    {
        $this->middleware('auth',['except'=>['index','show']]);
    }




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

        $posts = Post::orderBy('created_at','desc')->paginate(2); //paginate
        return view('posts/index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    // This is just to redirect to the create post page
    public function create()
    {
        return view('posts/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //This is to store the creted post inside the database table
        $this->validate($request,[
            'title'=>'required',
            'body'=>'required'
        ]);

        //Create post if no errors
        $post = new Post;
        $post->title = $request->input('title');//gets the title submitted into the form
        $post->body= $request->input('body');
        $post->user_id = auth()->user()->id; //(7) will take the currently logged in user and get his user_id
        $post->save();
        return redirect('/posts');
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
        //Edits a post once click on it and in the show.php
        $post = Post::find($id);

        //(15)check for correct user
        if(auth()->user()->id!== $post->user_id){
            return redirect('/posts');
        }



        return view('posts/edit')->with('post',$post);

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
        //linked to the above, once decide to edit and make changes, need to update the post
        $this->validate($request,[
            'title'=>'required',
            'body'=>'required'
        ]);


        $post = Post::find($id);
        $post->title = $request->input('title');//gets the title submitted into the form
        $post->body= $request->input('body');
        $post->save();
        return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //to delete a post
        $post = Post::find($id);

        //(16)check for correct user
        if(auth()->user()->id!== $post->user_id){
            return redirect('/posts');
        }
        $post->delete();
        return redirect('/posts');
    }
}
