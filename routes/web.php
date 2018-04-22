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

Route::get('/', 'HomeController@welcome')->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/search', 'JobController@index')->name('search');
Route::get('/create-new-job', 'JobController@create')->name('createJob');
Route::post('/create-new-job', 'JobController@store')->name('createNewJob');
Route::get('/job/{job}', 'JobController@show')->name('showJob');
Route::post('/apply-for-job', 'JobController@apply')->name('showJob');
