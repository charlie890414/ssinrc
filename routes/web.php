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

Route::post('/post',  'PostController@store');
Route::get('/post', function(){
    return view('post');
});
Route::get('/post/{id}', function($id){
    return view('singlepost',[
        'id' => $id
    ]);
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/user', 'UserController@index');
Route::get('/user/delete/{id}', 'UserController@destroy');
Route::get('/user/update/{id}','UserController@updateindex');
Route::post('/user', 'UserController@store');
Route::post('/user/upadte/{id}', 'UserController@update');
