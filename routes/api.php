<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([
    'namespace' => 'Api',
], function () {
    Route::group([
//        'middleware' => 'verify.ajax',
    ], function () {
        Route::post('/book/insert', 'BookInsertExecuteController@main');
        Route::get('/balance', 'BalanceController@main');
    });
});
