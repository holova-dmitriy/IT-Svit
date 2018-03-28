<?php

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

Route::group(['prefix' => 'users'], function () {
    Route::get('/', 'UsersController@index')->name('api.users.index');
    Route::post('/', 'UsersController@store')->name('api.users.store');
    Route::get('{user}', 'UsersController@show')->name('api.users.show');
    Route::put('{user}', 'UsersController@update')->name('api.users.update');
    Route::delete('{user}', 'UsersController@destroy')->name('api.users.destroy');
});
