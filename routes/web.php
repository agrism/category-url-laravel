<?php

use Illuminate\Support\Facades\Route;


//Route::get('/', function () {
//    return view('welcome');
//});


Route::get('/ad', 'App\Http\Controllers\Ad\AdController@index');
Route::get('/adAdd', 'App\Http\Controllers\Ad\AddAdController@index');
Route::get('/{any}', 'App\Http\Controllers\MainController@index')->where('any', '.*');
Route::get('/', 'App\Http\Controllers\MainController@index');
