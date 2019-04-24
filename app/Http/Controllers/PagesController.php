<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// This controller is to go to specific pages
class PagesController extends Controller
{
    //method to go to the index page
    public function index(){

        $title = 'zdrastitya';
        return view('pages/index')->with('title',$title);
    }

    public function about(){
        $title = 'ABOUT US';
        return view('pages/about')->with('title',$title);
    }

    public function services(){
        $data=[
          'title'=>'SERVICES',
            'services'=>['web design','programming','SEO']
        ];
        return view('pages/services')->with($data);
    }
}
