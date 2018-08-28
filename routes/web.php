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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/verify/token/{token}', 'Auth\VerificationController@verify')->name('auth.verify');
Route::get('/verify/resend', 'Auth\VerificationController@resend')->name('auth.verify.resend');

Route::namespace('Member')->group(function() {
    Route::resource('book', 'BooksController');
    Route::get('search', 'BooksController@getInforSearch')->name('search.book');
    Route::resource('category', 'CategoryController');
    Route::resource('request-book', 'RequestBookController');
});

Route::post('/review', 'AjaxController@postReview')->name('post.review');
Route::get('/get-request', 'AjaxController@getRequest')->name('get.request');
