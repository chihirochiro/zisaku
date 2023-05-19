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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('posts', 'PostController');
// Route::get('/posts','PostController@index')->name('posts.index'); 投稿内容の一覧表示
// Route::get('/posts/create','PostController@create')->name('posts.create'); 新規投稿内容の表示
// Route::post('/posts','PostController@store')->name('posts.store'); 新規投稿処理
// Route::post('/posts/{post} ','PostController@show')->name('posts.show'); 投稿詳細
// Route::get('/posts/{post}/edit ','PostController@edit')->name('posts.edit');　アカウント編集画面の表示
// Route::post('/posts/{post} ','PostController@edit')->name('posts.update');　アカウント編集更新


Route::resource('mypage', 'MypageController');
Route::resource('user', 'UserController');
// Route::get('/user','UserController@index')->name('user.index'); 一覧表示
// Route::get('/user/create','UserController@create')->name('user.create');　ユーザー登録画面の表示
// Route::post('/user','UserController@store')->name('user.store');　ユーザー登録処理
// Route::get('/user/{user}/edit ','UserController@edit')->name('user.edit');　アカウント編集画面の表示