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

Route::get('/search/', 'SearchWordController@main');
Route::get('/search/{page}', 'SearchWordController@main');

Route::group([
    'middleware' => 'auth',
], function () {
    Route::get('/', 'MyBookController@main');
    Route::get('/mybook/', 'MyBookController@main');
    Route::get('/mybook/{type}/', 'MyBookTypeController@main');
//    Route::get('/balance/', 'BalanceController@main');
    Route::post('/book/insert', 'BookInsertController@main');
});

Auth::routes();

Route::get('login/google', 'Auth\LoginController@redirectToGoogle');
Route::get('login/google/callback', 'Auth\LoginController@handleGoogleCallback');
