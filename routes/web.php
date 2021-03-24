<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/','CinemaController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->as('admin.')->group(function(){
    Route::resource('cinemas', 'CinemaController');
    Route::resource('movies', 'MovieController');
    Route::resource('showtimes', 'ShowTimeController');
});
