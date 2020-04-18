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

Route::get('/search/', 'SearchWordController@main')->name('search');
Route::get('/search/{page}', 'SearchWordController@main')->name('search.page');

Route::group([
    'middleware' => 'auth',
], function () {
    Route::get('/', 'HomeController@main')->name('home');
    Route::get('/mybooks/{type}/', 'MyBookTypeController@main')->name('mybooks');
//    Route::get('/balance/', 'BalanceController@main');
    Route::post('/book/insert', 'BookInsertController@main')->name('book.insert');
});

Auth::routes();

Route::get('login/google', 'Auth\LoginController@redirectToGoogle');
Route::get('login/google/callback', 'Auth\LoginController@handleGoogleCallback');
