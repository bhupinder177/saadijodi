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

// Route::get('/', function () {
//     return view('welcome');
// });

// Start Front End routes
Route::get('/', 'HomeController@index')->name('home');
Route::get('/login', 'Auth\LoginController@showlogin')->name('login');
// End Front End routes
Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');
Route::post('/userlogin', 'Auth\LoginController@login');
Route::post('/userRegister', 'Auth\RegisterController@save');
Route::get('/verification', 'Auth\RegisterController@verification');
Route::get('/forgot-password','Auth\ResetPasswordController@forgot');
Route::post('/forgotPassword','Auth\ResetPasswordController@forgotPassword');
Route::get('/forgotPassword-verifiy','Auth\ResetPasswordController@verify');
Route::post('/newPasswordUpdate','Auth\ResetPasswordController@newPasswordUpdate');

Route::group(['middleware' => ['auth']], function () {
  Route::get('/profile','ProfileController@index');
  Route::get('/edit-profile','ProfileController@edit');
  Route::post('/profileUpdate','ProfileController@update');
  Route::post('/getState','ProfileController@getState');
  Route::post('/getCity','ProfileController@getCity');
  Route::get('/partner-profile','ProfileController@partnerProfile');
  Route::get('/contact-details','ProfileController@contactdetails');
  Route::post('/contactDetailUpdate','ProfileController@contactDetailUpdate');
  Route::post('/partnerPreferenceUpdate','ProfileController@partnerPreferenceUpdate');

});
