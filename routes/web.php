<?php

use Illuminate\Support\Facades\Route;

Route::get('/ad', 'App\Http\Controllers\Ad\AdController@index');
Route::get('/addAd', 'App\Http\Controllers\Ad\AddAdController@index');
Route::get('/create-cats', 'App\Http\Controllers\MainController1@createCats')->name('createCats');

Route::get('/{any?}', 'App\Http\Controllers\MainController1@index')
    ->where('any', '.*')
    ->name('main-any');