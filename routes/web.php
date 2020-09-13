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
            Route::post('review-reaction', 'ReviewController@reviewReaction')->name('review-reaction');
            Route::post('review-add-comment', 'ReviewController@reviewAddComment')->name('review-add-comment');
        });

        Route::group([
            'prefix' => 'profile',
            'middleware' => [ 'auth', 'verified' ],
        ], function(){
            Route::get('info', 'Profile\PersonalInfoController@index')->name('profile-info');
            Route::resource('reviews', 'Profile\ReviewController')->only([
                'index', 'edit', 'update', 'destroy'
            ])->names('profile-reviews');
//            Route::get('reviews', 'Profile\ReviewController@index')->name('profile-reviews');
            Route::get('changePassword', 'Auth\ChangePasswordController@showChangePasswordForm')->name('get-change-password');
            Route::post('changePassword', 'Auth\ChangePasswordController@changePassword')->name('change-password');
            Route::patch('update-persona-info', 'Profile\PersonalInfoController@updatePersonalInfo')->name('updatePersonalInfo');
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
                ->middleware('auth', 'verified');;
        });
});
