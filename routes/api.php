<?php

use Illuminate\Http\Request;

/*
  |--------------------------------------------------------------------------
  | API Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register API routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | is assigned the "api" middleware group. Enjoy building your API!
  |
 */

Route::get('/test', function (Request $request) {
    $msg = ['Hola este es un text'];
    return response()->json($msg, 200);
});


/**
 * http://dominio.com/api/calc
 * ejemplo de uso: {"expression": "-1 * (2 * 6 / 3)"}
 */
//Route::match(['get', 'post'], '/calc', 'CalcController@calc')->name('calc');
Route::match(['get', 'post'], '/calc', 'CalcController@calc')->name('calc');
