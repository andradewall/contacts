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

Route::group(['prefix' => 'persons'], function () {
    Route::get('/', 'PersonsController@index');
    Route::get('/new', "PersonsController@newView");
    Route::post('/store', 'PersonsController@store');
});