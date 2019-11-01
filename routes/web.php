<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Route list to manage web application
|
*/

Route::get('/', 'PhotoController@index')->name('home');
Route::resource('/photos', 'PhotoController');

