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
        Route::post('toDayMatchListing', 'ApiController@toDayMatchListing');
        Route::post('profileDetail', 'ApiController@profileDetail');
        Route::post('profileUpdate', 'ApiController@profileUpdate');
        Route::post('connectSave', 'ApiController@connectSave');
        Route::get('getPackage', 'ApiController@getPackage');
        Route::get('allreligion', 'ApiController@allreligion');
        Route::get('allcommunity', 'ApiController@allcommunity');
        Route::get('allmothertongue', 'ApiController@allmothertongue');
        Route::get('allheight', 'ApiController@allheight');
        Route::get('allqualification', 'ApiController@allqualification');
        Route::get('allWorkingSectors', 'ApiController@allWorkingSectors');
        Route::get('allCountry', 'ApiController@allCountry');
        Route::post('getState', 'ApiController@getState');
        Route::post('getCity', 'ApiController@getCity');
        Route::post('favouriteSave', 'ApiController@favouriteSave');
        Route::post('favouriteList', 'ApiController@favouriteList');
        Route::post('favouriteRemove', 'ApiController@favouriteRemove');
        Route::get('getContactDetail', 'ApiController@getContactDetail');
        Route::post('contactDetailsSave', 'ApiController@ContactDetailsSave');
        Route::get('getPartnerPerference', 'ApiController@getPartnerPerference');
        Route::post('partnerPerferenceSave', 'ApiController@partnerPerferenceSave');
        Route::post('listingFilter','ApiController@listingFilter');
        Route::get('getOurProfile','ApiController@getOurProfile');

    });
