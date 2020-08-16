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
            Route::post('review-reaction', 'ReviewController@reviewReaction')->name('review-reaction');
        });

        Route::group([
            'prefix' => 'profile',
            'middleware' => [ 'auth', 'verified' ]
        ], function(){
            Route::get('info', 'ProfileController@info')->name('profile-info');
            Route::get('changePassword', 'Auth\ChangePasswordController@showChangePasswordForm')->name('get-change-password');
            Route::post('changePassword', 'Auth\ChangePasswordController@changePassword')->name('change-password');
            Route::patch('update-persona-info', 'ProfileController@updatePersonalInfo')->name('updatePersonalInfo');
        });

        Route::group([
            'prefix' => 'reviews',
//            'middleware' => [ 'auth', 'verified' ]
        ], function(){
            Route::get('/{review_item}', 'ReviewController@index')->name('reviews');
            Route::get('create/{review_item}', 'ReviewController@create')
                ->name('create-review')
                ->middleware('auth', 'verified');
            Route::post('save', 'ReviewController@save')
                ->name('save-review')
                ->middleware('auth', 'verified');;
        });
});
