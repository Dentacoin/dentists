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

    Route::get('/faq', 'FaqController@getView')->name('faq');

    Route::get('/download-assets', 'DownloadAssetsController@getView')->name('download-assets');

    Route::get('sitemap.xml', 'Controller@getSitemap')->name('sitemap');

    //======================================= LOGIN LOGIC ========================================

    Route::get('/home', 'HomeController@getNotLoggedView')->middleware('HandleUserSession')->name('logged-home');

    Route::get('/test', function() {
        $url = urlencode((new \App\Http\Controllers\Controller())->encrypt(session('logged_user')['id'], getenv('API_ENCRYPTION_METHOD'), getenv('API_ENCRYPTION_KEY')));
        var_dump($url);
        var_dump(urldecode($url));
        die('asd');
    });

    Route::get('/my-profile', 'UserController@getMyProfileView')->middleware('HandleUserSession')->name('my-profile');

    Route::get('/edit-account', 'UserController@getEditAccountView')->middleware('HandleUserSession')->name('edit-account');

    Route::get('/manage-privacy', 'UserController@getManagePrivacyView')->middleware('HandleUserSession')->name('manage-privacy');

    Route::post('/validate-civic-kyc', 'UserController@validateCivicKyc')->middleware('HandleUserSession')->name('validate-civic-kyc');

    Route::post('/delete-my-profile', 'UserController@deleteMyProfile')->middleware('HandleUserSession')->name('delete-my-profile');

    Route::post('/update-account', 'UserController@updateAccount')->middleware('HandleUserSession')->name('update-account');

    Route::post('/add-dcn-address', 'UserController@addDcnAddress')->middleware('HandleUserSession')->name('add-dcn-address');

    Route::get('/user-logout', 'UserController@userLogout')->name('user-logout');

    Route::get('/get-current-user-data', 'UserController@getCurrentUserData')->middleware('HandleUserSession')->name('get-current-user-data');

    Route::post('/withdraw', 'UserController@withdraw')->middleware('HandleUserSession')->name('withdraw');

    Route::post('/dentist-login', 'UserController@dentistLogin')->name('dentist-login');

    Route::post('/dentist-register', 'UserController@dentistRegister')->name('dentist-register');

    Route::post('/patient-login', 'UserController@patientLogin')->name('patient-login');

    Route::get('/forgotten-password', 'UserController@getForgottenPasswordView')->name('forgotten-password');

    Route::post('/password-recover', 'UserController@getRecoverPassword')->name('password-recover');

    Route::post('/download-gdpr-data', 'UserController@downloadGDPRData')->name('download-gdpr-data');

    Route::get('/forgotten-password', 'UserController@getForgottenPasswordView')->name('forgotten-password');

    Route::post('/forgotten-password-submit', 'UserController@forgottenPasswordSubmit')->name('forgotten-password-submit');

    Route::post('/password-recover-submit', 'UserController@changePasswordSubmit')->name('password-recover-submit');

    Route::post('/enrich-profile', 'UserController@enrichProfile')->name('enrich-profile');

    Route::post('/invite-your-clinic', 'UserController@inviteYourClinic')->name('invite-your-clinic');

    Route::post('/check-dentist-account', 'UserController@checkDentistAccount')->name('check-dentist-account');

    //======================================= AJAX ========================================

    Route::post('/submit-apply-position', 'CareersController@submitApplyPosition')->name('submit-apply-position');

    Route::post('/check-email', 'UserController@checkEmail')->name('check-email');

    Route::post('/check-captcha', 'UserController@checkCaptcha')->name('check-captcha');

    //======================================= REDIRECTS ========================================

    Route::get('answers', function() {
        return Redirect::to('/faq');
    });

});

