<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User; //(10)

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //(10) to fetch the posts of a specific user
        $user_id = auth()->user()->id;
        $user = User::find($user_id);


        return view('home')->with('posts',$user->posts); //this can do due to the relationship in (9)
    }
}
