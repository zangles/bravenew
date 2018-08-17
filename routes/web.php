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

Route::get('/', 'HomeController@index')->name('web');
Route::post('/', 'HomeController@search')->name('search');

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::resource('services', 'ServiceController');
});