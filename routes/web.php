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

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){
        Auth::routes();

        Auth::routes(['verify' => true]);

        Route::get('/', 'HomeController@index')->name('home');

        Route::group(['prefix' => 'ajax'], function() {
            Route::get('regions/{country}', 'RegionController');
            Route::get('groups/{group}', 'ReviewCategoryGroupController');
            Route::get('bad-words', 'InfoController@getBadWords')->name('bad-words');
            Route::post('review-reaction', 'ReviewController@reviewReaction')->name('review-reaction');
            Route::post('review-message-read', 'ReviewController@reviewReadMessages')->name('review-message-read');
            Route::post('review-comment-reaction', 'CommentController@commentReaction')->name('review-comment-reaction');
            Route::post('review-add-comment', 'CommentController@addReviewComment')->name('review-add-comment');
            Route::post('review-send-message', 'MessageController@addReviewMessage')->name('review-send-message');
        });

        Route::group([
            'prefix' => 'profile',
            'middleware' => [ 'auth', 'verified' ],
        ], function(){
            Route::get('info', 'Profile\PersonalInfoController@index')->name('profile-info');
            Route::resource('reviews', 'Profile\ReviewController')->only([
                'index', 'edit', 'update', 'destroy'
            ])->names('profile-reviews');
            Route::get('messages', 'Profile\MessageController@index')->name('profile-messages');
            Route::get('banners', 'Profile\BannerController@index')->name('banners');
            Route::get('changePassword', 'Auth\ChangePasswordController@showChangePasswordForm')->name('get-change-password');
            Route::post('changePassword', 'Auth\ChangePasswordController@changePassword')->name('change-password');
            Route::patch('update-persona-info', 'Profile\PersonalInfoController@updatePersonalInfo')->name('updatePersonalInfo');
            Route::post('save-banner', 'Profile\BannerController@save')->name('saveBanner');
        });

        Route::group([
            'prefix' => 'admin',
            'as' => 'admin.',
            'namespace' => 'Admin',
            'middleware' => ['auth', 'verified', 'twofactor']
        ], function(){
            Route::resource('/contacts', 'ContactController')->only('index', 'store');
            Route::get('/info_page/{info_page}', 'InfoPageController@index')->name('info_page');
            Route::post('/info_page', 'InfoPageController@store')->name('save_info_page');
        });

        Route::group([
            'prefix' => 'reviews',
        ], function(){
            Route::get('/{review_item}', 'ReviewController@index')->name('reviews');
            Route::get('create/{review_item}', 'ReviewController@create')
                ->name('create-review')
                ->middleware('auth', 'verified');
            Route::post('save', 'ReviewController@save')
                ->name('save-review')
                ->middleware('auth', 'verified');
        });

        Route::get('search', 'ReviewController@search')->name('search');
        Route::get('term-of-service', 'InfoController@termOfService')->name('term-of-service');
        Route::get('term-of-conditions', 'InfoController@termOfConditions')->name('term-of-conditions');
        Route::get('privacy-policy', 'InfoController@privacyPolicy')->name('privacy-policy');
        Route::get('get-in-touch', 'InfoController@getInTouch')->name('get-in-touch');
        Route::post('send-touch-info', 'InfoController@sendTouchInfo')->name('send-touch-info');
        Route::post('share', 'InfoController@share')->name('share');

        Route::get('verify/resend', 'Auth\TwoFactorController@resend')->name('verify.resend');
        Route::resource('verify', 'Auth\TwoFactorController')->only(['index', 'store']);
});

//Route::any('adminer', '\Aranyasen\LaravelAdminer\AdminerAutologinController@index');
