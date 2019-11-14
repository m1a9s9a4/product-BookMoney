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

Route::group([
    'middleware' => 'auth',
], function () {
    Route::get('/', 'SearchBookController@main');
    Route::get('/search/book/', 'SearchBookController@main');
    Route::get('/book/shelf/', 'BookShelfController@main');
    Route::get('/book/shelf/{type_name}/', 'BookShelfTypeController@main');

    Route::post('/user/book/insert', 'UserBookInsertExecuteController@main');
});

Auth::routes();
