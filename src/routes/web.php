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
    return view('login');
});
Route::get('/user', 'UserController@index');
Route::get('/bbs', 'BbsController@index');

Route::post('/bbs', 'BbsController@create');

Route::get('/home', 'Github\GithubController@top');
Route::post('github/issue', 'Github\GithubController@createIssue');
Route::get('login/github', 'Auth\LoginController@redirectToProvider');
Route::get('login/github/callback', 'Auth\LoginController@handleProviderCallback');


Route::get('/logout', 'Auth\LoginController@logout');

Route::post('user', 'User\UserController@updateUser');

Route::get('/upload', 'UploadController@index');
Route::post('/upload', 'UploadController@upload');

Route::get('/home', 'HomeController@index');

Route::get('/profile', 'ProfileController@index');


Route::post('/home/delete', 'LikesController@delete');
Route::post('/home/like', 'LikesController@like');
Route::post('/image/like', 'ImageController@like');

Route::get('/home/profile', 'LikesController@profile');

Route::get('/home/profile/image', 'ImageController@index');

Route::get('/liked/profile', 'LikesController@profile');
Route::get('/home/liked', 'LikesController@likedusers');

Route::post('/like',function(){
  if(Request::ajax()){
    return Response::json(Request::all());
  }
});

Auth::routes();
