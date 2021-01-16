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

//Route::get('/', function () {
//    return view('welcome');
//});


Route::get('/ad', 'App\Http\Controllers\Ad\AdController@index');
Route::get('/adAdd', 'App\Http\Controllers\Ad\AddAdController@index');
Route::get('/{any}', 'App\Http\Controllers\MainController@index')->where('any', '.*');
Route::get('/', 'App\Http\Controllers\MainController@index');
