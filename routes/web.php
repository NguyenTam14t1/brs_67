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
//user
Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::namespace('Auth')->group(function() {
    Route::get('/verify/token/{token}', 'VerificationController@verify')->name('auth.verify');
    Route::get('/verify/resend', 'VerificationController@resend')->name('auth.verify.resend');
    Route::get('/auth/{provider}', 'SocialAuthController@redirectToProvider');
    Route::get('/auth/{provider}/callback', 'SocialAuthController@handleProviderCallback');
});

Route::namespace('Member')->group(function() {
    Route::resource('book', 'BookController');
    Route::get('search', 'BookController@getInforSearch')->name('user.search.book');
    Route::resource('category', 'CategoryController');
    Route::resource('request-book', 'RequestBookController');
});

Route::post('/review', 'AjaxController@postReview')->name('post.review');
Route::post('/change-status', 'AjaxController@changeStatus')->name('post.change.status');
Route::get('/get-request', 'AjaxController@getRequest')->name('get.request');

//admin
Route::group(['middleware' => 'admin', 'namespace' => 'Admin'], function () {
    Route::resource('manager-request-book', 'RequestBookController');
    Route::get('search-request-book', 'RequestBookController@getInforSearch')->name('search.request.book');
    Route::resource('manager-user', 'UserController');
    Route::get('search-user', 'UserController@getInforSearch')->name('search.user');
    Route::resource('manager-book', 'BookController');
    Route::get('search-book', 'BookController@getInforSearch')->name('search.book');
});

Route::namespace('Admin')->group(function() {
    Route::get('/admini', 'LoginController@index')->name('admin');
    Route::get('admin.logout','LoginController@getLogout')->name('admin.logout');
    Route::post('admin/get-login', 'LoginController@getLogin')->name('admin.login');
});
