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

    Route::get('/test123', function() {
        var_dump(getenv('APP_KEY'));
        var_dump(session('logged_user'));
        die('asd');
    })->name('test123');

    Route::get('/faq', 'FaqController@getView')->name('faq');

    Route::get('/download-assets', 'DownloadAssetsController@getView')->name('download-assets');

    Route::get('sitemap.xml', 'Controller@getSitemap')->name('sitemap');

    //======================================= AJAX ========================================


    //======================================= REDIRECTS ========================================

    Route::get('answers', function() {
        return Redirect::to('/faq');
    });

});