<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the 'web' middleware group. Now create something great!
|
*/

//Route::get('/refresh-captcha', 'Controller@refreshCaptcha')->name('refresh-captcha');

Route::group(['prefix' => '/', 'middleware' => 'frontEndMiddleware'], function () {

    //======================================= PAGES ========================================

    Route::get('/', 'HomeController@getView')->name('home');

    Route::get('/faq', 'PagesController@getPageView')->name('faq');

    Route::get('/download-assets', 'PagesController@getPageView')->name('download-assets');

    Route::get('/download-guides-assets', 'PagesController@getDummyPageView')->name('download-guides-assets');

    Route::get('sitemap.xml', 'Controller@getSitemap')->name('sitemap');

    //======================================= LOGIN LOGIC ========================================

    Route::get('/home', 'PagesController@getPageView')->middleware('HandleUserSession')->name('logged-home');

    Route::get('/user-logout', 'UserController@userLogout')->name('user-logout');

    Route::get('/get-current-user-data', 'UserController@getCurrentUserData')->middleware('HandleUserSession')->name('get-current-user-data');

    Route::post('/authenticate-user', 'UserController@authenticateUser')->name('authenticate-user');

    Route::post('/invite-your-clinic', 'UserController@inviteYourClinic')->name('invite-your-clinic');

    Route::post('/check-dentist-account', 'UserController@checkDentistAccount')->name('check-dentist-account');

    Route::get('/custom-cookie', 'UserController@manageCustomCookie')->name('custom-cookie');

    //======================================= AJAX ========================================

    Route::post('/check-email', 'UserController@checkEmail')->name('check-email');

    Route::post('/check-captcha', 'UserController@checkCaptcha')->name('check-captcha');

    //======================================= REDIRECTS ========================================

    Route::get('answers', function() {
        return Redirect::to('/faq');
    });
});