<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// This controller is to go to specific pages
class PagesController extends Controller
{
    //method to go to the index page
    public function index(){
        return view('pages/index');
    }

    public function about(){
        return view('pages/about');
    }

    public function services(){
        return view('pages/services');
    }
}
