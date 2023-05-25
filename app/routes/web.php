<?php
use App\User;
use App\Post;
use App\Http\Controllers\AdminController;



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


Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset/{token}', 'Auth\ResetPasswordController@reset');

Auth::routes();

Route::group(['middleware' => 'auth'],function(){

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('posts', 'PostController');


Route::resource('mypage', 'MypageController');
Route::resource('user', 'UserController');

Route::resource('comment', 'CommentController');

Route::resource('shop', 'ShopController');

Route::get('/count/{id}', 'ShopController@bad_count')->name('shop.bad_count');

Route::get('/serch', 'PostController@serch')->name('post.serch');

Route::get('/reply/{id}', 'CommentController@rep')->name('comment.rep');
Route::post('/reply/{id}', 'CommentController@store');

Route::resource('reserve', 'ReserveController');

Route::post('ajaxlike', 'PostController@ajaxlike')->name('posts.ajaxlike');


Route::get('/management', [AdminController::class, 'adminIndex'])->name('admin.index');
Route::get('/manage_post', [AdminController::class, 'adminPost'])->name('admin.post');
Route::get('/manage_general', [AdminController::class, 'adminGeneral'])->name('admin.general');
Route::get('/manage_shop', [AdminController::class, 'adminShop'])->name('admin.shop');






});