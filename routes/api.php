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



    Route::post('login', 'ApiController@login');
    Route::post('signup', 'ApiController@signup');
    Route::post('forgetPassword', 'ApiController@forgetPassword');

    Route::group([
      'middleware' => 'auth:api'
    ], function() {
        Route::get('logout', 'ApiController@logout');
        Route::post('changePassword', 'ApiController@changePassword');
        Route::get('user', 'ApiController@user');
        Route::get('toDayMatchListing', 'ApiController@toDayMatchListing');
        Route::post('profileDetail', 'ApiController@profileDetail');
        Route::post('connectSave', 'ApiController@connectSave');


    });
