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

// パスワードリセット
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset/{token}', 'Auth\ResetPasswordController@reset');

Auth::routes();

// ミドルウェア
Route::group(['middleware' => 'auth'],function(){

// ホームコントローラー
Route::get('/home', 'HomeController@index')->name('home');

// Post（投稿）コントローラー
Route::resource('posts', 'PostController');

// マイページコントローラー
Route::resource('mypage', 'MypageController');

// ユーザーコントローラー
Route::resource('user', 'UserController');

// コメント・メッセージコントローラー
Route::resource('comment', 'CommentController');
Route::get('/reply/{id}', 'CommentController@rep')->name('comment.rep');
Route::post('/reply/{id}', 'CommentController@store');

// Shop（店舗）コントローラー
Route::resource('shop', 'ShopController');

// Shop（違反報告）コントローラー
Route::get('/count/{id}', 'ShopController@bad_count')->name('shop.bad_count');

// 検索コントローラー
Route::get('/serch', 'PostController@serch')->name('post.serch');

// 予約コントローラー
Route::resource('reserve', 'ReserveController');

// エイジャックス
Route::post('ajaxlike', 'PostController@ajaxlike')->name('posts.ajaxlike');

// Admin（管理者）コントローラー
Route::get('/management', [AdminController::class, 'adminIndex'])->name('admin.index');
Route::get('/manage_post', [AdminController::class, 'adminPost'])->name('admin.post');
Route::get('/manage_general', [AdminController::class, 'adminGeneral'])->name('admin.general');
Route::get('/manage_shop', [AdminController::class, 'adminShop'])->name('admin.shop');

});