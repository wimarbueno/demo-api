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
define('CID', '?cid=05');

Route::get('/', function () {
    return view('welcome');
});
Route::match(['get', 'post'], '/calc/index', 'CalcController@index')->name('calc:index');
