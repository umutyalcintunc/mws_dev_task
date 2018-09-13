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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', 'HomeController@start_get');
Route::post('/start_post', 'HomeController@start_post')->name('start_post');

Route::get('continue', [
    'as' => 'continue', 'uses' => 'HomeController@continue_get']);
Route::post('continue', [
    'as' => 'continue', 'uses' => 'HomeController@continue_post']);