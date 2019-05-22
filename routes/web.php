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

Route::get('/', 'TravelController@index');

Route::get('/travels/{id}', 'TravelController@show');
Route::post('/joinTravel/{id}', 'TravelController@travelJoin');
Route::post('/resignTravel/{id}', 'TravelController@travelResing');

Route::get('/newtravel', 'TravelController@showNew');
Route::post('/newtravel', 'TravelController@store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
