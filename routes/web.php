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
Route::get('/', 'PagesController@home')->name('home');
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::get('/about', 'PagesController@about')->name('about');
Route::resource('homes', 'HomesController');
Route::patch('/homes/{home}/sold', 'HomesController@markSold');
Auth::routes();
