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
    Route::get('/', function () {
        return redirect('persons/A');
    });
    Route::get('/new', "PersonsController@newView");
    Route::post('/save', 'PersonsController@save');
    Route::get('/{id}/edit', 'PersonsController@editView');
    Route::get('/{id}/remove', 'PersonsController@removeView');
    Route::get('/{id}/delete', 'PersonsController@delete');
    Route::post('/edit', 'PersonsController@edit');
    Route::post('/search', 'PersonsController@search');
    Route::get('/{letter}', 'PersonsController@index');
});