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
Route::get('/test', 'PagesController@about')->name('about');
Route::post('/test', 'PagesController@storeFile')->name('about.store');
Route::resource('homes', 'HomesController');
Route::get('homes/create', 'HomesController@create')->name('homes.create')->middleware('auth');
Route::get('homes/{home}/edit', 'HomesController@edit')->name('homes.edit')->middleware('auth');
Route::patch('/homes/{home}/sold', 'HomesController@markSold')->name('homes.sold')->middleware('auth');
Auth::routes();
