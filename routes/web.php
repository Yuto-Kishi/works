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

Route::get('/', function () {
    return view('welcome');
});
Route::group(['prefix' => 'admin'], function() {
    Route::get('art/create','Admin\ArtController@add')->middleware('auth');
    Route::get('art/edit','Admin\ArtController@edit');
    Route::post('art/create', 'Admin\ArtController@create');
    Route::get('art', 'Admin\ArtController@index');
    Route::post('art/edit','Admin\ArtController@update');
    Route::get('art/delete','Admin\ArtController@delete');
    Route::get('/', 'ArtController@index');
    Route::post('/art', 'ArtController@store');
    
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/upload', 'HomeController@upload');
