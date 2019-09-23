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



Route::namespace("BackEnd")->prefix("admin")->middleware('admin')->group(function() {
	
	Route::get("home", "Home@index");

	Route::resource("users", "Users")->except(["show"]);

	Route::resource("categories", "Categories")->except(["show"]);

	Route::resource("skills", "Skills")->except(["show"]);

	Route::resource("tags", "Tags")->except(["show"]);

	Route::resource("pages", "Pages")->except(["show"]);

	Route::resource("videos", "Videos")->except(["show"]);

	Route::resource("messages", "Messages")->only(["index", "destroy", "replyMessage"]);

	Route::post("comments", "Videos@commentStore");

	Route::get("comments/{id}", "Videos@commentDelete");

	Route::post("comments/{id}/edit", "Videos@commentUpdate");

	Route::get("reply-message/{id}", "Messages@replyMessage");

	Route::post("message/reply/{id}", "Messages@reply");
	
});

Auth::routes();

	
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'HomeController@welcome');

Route::get('/category/{id}', 'HomeController@category');

Route::get('/skill/{id}', 'HomeController@skill');

Route::get('/video/{id}', 'HomeController@video');

Route::get('/tag/{id}', 'HomeController@tag');

Route::get('/page/{id}/{slug?}', 'HomeController@page');

Route::get('/profile/{id}/{slug?}', 'HomeController@profile');

Route::get('/profile', 'HomeController@profileUpdate');



Route::middleware('auth')->group(function() {

	Route::post('/comment/{id}', 'HomeController@commentUpdate');

	Route::post('/comment/{id}/create', 'HomeController@commentStore');

	Route::post('/profile', 'HomeController@profileUpdate');

});

Route::post('contact-us', 'HomeController@messageStore');



