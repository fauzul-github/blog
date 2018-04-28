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

//Route::get('/', function () {
   // return view('welcome');
//});

//Route::get('/', function(){
    //return view('welcome', [
        //'name' => 'Akash'
    //]);
//});

//Route::get('/', function(){
    //return view('welcome')->with('name', 'Akash');
//});

//Route::get('/', function(){
    //$name = 'Akash';
    //return view('welcome', $name);
//});
use App\Task;

Route::get('/', 'PostsController@index')->name('home');

Route::get('/tasks', 'TasksController@index');
Route::get('tasks/{task}', 'TasksController@show');


Route::get('/posts/create', 'PostsController@create');
Route::post('/posts', 'PostsController@store');
Route::get('/posts', 'PostsController@index');
Route::get('/posts/{post}', 'PostsController@show');
Route::post('/posts/{post}/comments', 'CommentsController@store');

Route::get('/comments/{id}/{user_id}/{post_id}/edit', 'CommentsController@edit');
Route::post('/comments/{id}/{post_id}/update', 'CommentsController@update');
Route::get('/comments/{id}/{post_id}/delete', 'CommentsController@delete');
Route::get('/posts/{post}/edit', 'PostsController@edit');
Route::get('/posts/{post}/delete', 'PostsController@delete');
Route::post('/posts/{post}/update', 'PostsController@update');

Route::get('/register', 'RegistrationController@create');
Route::post('/register', 'RegistrationController@store');
Route::get('/login', 'SessionsController@create');
Route::get('/logout', 'SessionsController@destroy');

Route::post('/login', 'SessionsController@store');



