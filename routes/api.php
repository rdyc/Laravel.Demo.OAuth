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

Route::group(
    [
        'middleware' => 'auth:api',
        'namespace' => 'Api'
    ],

    function () {

        // read scopes
        Route::group(['middleware' => 'scope:profiles-read'], function () {
            Route::get('/user', 'ProfileController@get');
        });

        // write scopes
        Route::group(['middleware' => 'scope:profiles-write'], function () {
            Route::patch('/user', 'ProfileController@patch');
        });

    }
);