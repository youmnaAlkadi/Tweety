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


Route::middleware('auth')->group(function(){
Route::post('/tweets', 'TweetController@store');
Route::post('/tweets/{tweet}/like' , 'TweetlikeController@store');
Route::delete('/tweets/{tweet}/like' , 'TweetlikeController@destroy');

Route::get('/tweets', 'TweetController@index')->name('home');
Route::post('/profiles/{user}/follows' , 'FollowsController@store');
Route::get('/profiles/{user}/edit' , 'ProfilesController@edit');
Route::patch('/profiles/{user}' , 'ProfilesController@update');
Route::get('/explore' , 'ExploreController@index');

});

Route::get('/profiles/{user}' , 'ProfilesController@show')->name('profile');

Route::get('/explore' , 'ExploreController@index');
Auth::routes();


