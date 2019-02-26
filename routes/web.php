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

/*
//Directed to the welcome page
Route::get('/', function () {
    return view('welcome');
});
*/

// Http get request to the root directory('/') will be routed to BookController 
// and handled by index()
Route::get('/','BookController@index');

//Creat routes for functions in BookController
//Functions: index() shohw() create() store() edit() update() destroy()
Route::resource('books', 'BookController');

Auth::routes();//routes for all authentication
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/search','SearchController@search');

//->middleware('auth') Only allow authenticated users to access a given route
Route::get('contact', 'BookRequestController@create')->name('contact.create')->middleware('auth');

//Use Http post request to protect user data
Route::post('contact', 'BookRequestController@store')->name('contact.store')->middleware('auth');