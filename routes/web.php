<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


//dynamic routes with parameters - the parameter is part of the url
Route::get('/users/{id}/{name}', function ($id,$name) {
    return 'This is user '.$id.' my name is '.$name;
});


//DR: here the url public/about will return the page pages/about
/*
Route::get('/about', function () {
    return view('pages/about');
});
*/

//Here use the controller and methods to go to specific pages
Route::get('/','PagesController@index');
Route::get('/about','PagesController@about');
Route::get('/services','PagesController@services');

//Here don't have to make a route for each individual method in the PostsController
Route::resource('posts','PostsController');
