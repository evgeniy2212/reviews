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
            Route::get('regions/{country}', 'RegionController@getRegions');
        });

        Route::group([
            'prefix' => 'profile',
            'middleware' => [ 'auth', 'verified' ]
        ], function(){
            Route::get('info', 'ProfileController@info')->name('profile-info');
        });

//        Route::get('/', function () {
//            return view('welcome');
//        });
});
