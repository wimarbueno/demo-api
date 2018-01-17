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
define('BASE_URL', app()->environment());
define('CID', '?cid=18');

Route::get('/', function () {
    return view('welcome');
});
Route::match(['get', 'post'], '/calc/index', 'CalcController@index')->name('calc:index');

Route::match(['get', 'post'], '/social/index', 'SocialController@index')->name('social:index');
Route::match(['get', 'post'], '/social/filterbyuser', 'SocialController@filterByUser')->name('social:filterbyuser');
Route::match(['get', 'post'], '/social/search', 'SocialController@search')->name('social:search');
