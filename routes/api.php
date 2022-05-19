<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
//Route::group(
//    [
//        'prefix' => 'chat',
//        'as' => 'chat.',
//        'middleware' => ['auth']
//    ], function() {
//    Route::get('/', 'ChatController@index')->name('index');
//    Route::get('/{user_id}', 'ChatController@getChat')->name('userChat');
//    Route::get('search/users/{query?}', 'ChatController@search')->name('search');
//    Route::get('search/unread_messages', 'ChatController@chatsWithUnreadMessages');
//
//    Route::group(['prefix' => 'messages', 'as' => 'messages.'], function() {
//        Route::get('/{id}', 'ChatController@getMessages')->name('index');
//        Route::post('/', 'ChatController@storeMessage')->name('save');
//        Route::post('leave', 'ChatController@leaveChat')->name('leave');
//        Route::post('enter', 'ChatController@enterChat')->name('enter');
//    });
//});

