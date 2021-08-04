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
Route::get('/contact-us','ContactController@index');
Route::post('/contactSave','ContactController@contactSave');
Route::get('/about-us','ContactController@about');
Route::get('/faqs','ContactController@faq');
Route::get('/term-conditions','ContactController@term');
Route::get('/privacy-policy','ContactController@privacy');
Route::get('/refund-policy','ContactController@privacy');

Route::group(['middleware' => ['auth','agent']], function () {
  Route::get('/profile','ProfileController@index');
  Route::get('/edit-profile','ProfileController@edit');
  Route::post('/profileUpdate','ProfileController@update');
  Route::post('/getState','ProfileController@getState');
  Route::post('/getCity','ProfileController@getCity');
  Route::get('/partner-profile','ProfileController@partnerProfile');
  Route::get('/contact-details','ProfileController@contactdetails');
  Route::post('/contactDetailUpdate','ProfileController@contactDetailUpdate');
  Route::post('/partnerPreferenceUpdate','ProfileController@partnerPreferenceUpdate');
  Route::get('/listing','ListingController@index');
  Route::post('/deleteImages','ProfileController@deleteImages');
  Route::get('/user-profile/{id}','ProfileController@userProfile');
  Route::get('/notification','ProfileController@notification');
  Route::post('/notificationUpdate','ProfileController@notificationUpdate');
  Route::get('/online', 'ProfileController@online');
  Route::post('/inviteSend', 'ProfileController@inviteSend');
  Route::get('/membership','MembershipController@index');
  Route::get('payment/{id}', 'MembershipController@stripe');
  Route::post('stripe', 'MembershipController@stripePost')->name('stripe.post');
  Route::get('success', 'MembershipController@success');

  // message
  Route::get('/message','MessageController@index');
  Route::post('/getlatesthistory','MessageController@chatHistory');
  Route::post('/getoldMessage','MessageController@getoldMessage');
  Route::post('/gettime','MessageController@gettime');
  Route::post('/saveChat','MessageController@saveChat');
  Route::post('/CreateChatRoom','MessageController@CreateChatRoom');
  Route::post('/readmessage','MessageController@readmessage');
  // message

  Route::post('/checkPackage','MembershipController@checkPackage');
  Route::get('/change-password','ProfileController@changePassword');
  Route::post('/changePasswordSubmit','ProfileController@changePasswordSubmit');
});


// ******************************Website routes**********
// ******************************Admin routes**********
// Admin Routes
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('login', 'AdminController@loginView')->name('admin.login');
    Route::post('login', 'AdminController@loginAuthenticate');
    Route::get('forgot-password', 'AdminController@forgotPasswordView');
    Route::post('forgot-password', 'AdminController@forgotPassword');
    Route::get('reset-password/{token}', 'AdminController@resetPasswordView');
    Route::post('reset-password', 'AdminController@resetPassword');
    Route::get('logout', function () {
        \Auth::logout();

        return redirect('admin/login');
    });
    Route::group(['middleware' => ['auth', 'admin']], function () {


        Route::get('dashboard', 'DashboardController@DashboardView');
        Route::get('userlist', 'UserController@index');
        Route::post('ownerStatusUpdate', 'UserController@status');
        Route::get('packages','PackageController@index');
        Route::get('packages-add','PackageController@add');
        Route::post('packagesSave','PackageController@save');
        Route::get('packages-edit/{id}','PackageController@edit');
        Route::post('packages-update','PackageController@update');
        Route::post('packages-delete','PackageController@delete');

        Route::get('coupon','CouponController@index');
        Route::get('coupon-add','CouponController@add');
        Route::post('couponSave','CouponController@save');
        Route::get('coupon-edit/{id}','CouponController@edit');
        Route::post('coupon-update','CouponController@update');
        Route::post('coupon-delete','CouponController@delete');

        Route::get('/password', 'DashboardController@password');
        Route::post('/passwordUpdate', 'DashboardController@passwordUpdate');


    });
  });
// ******************************Admin routes**********
