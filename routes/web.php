<?php

use App\Http\Controllers\MainController1;
use Illuminate\Support\Facades\Route;

Route::get('/ad', 'App\Http\Controllers\Ad\AdController@index');
Route::get('/addAd', 'App\Http\Controllers\Ad\AddAdController@index');
Route::get('/create-cats', 'App\Http\Controllers\MainController1@createCats')->name('createCats');

// Route::get('/add/{?any}', function(?string $any){
//     createAdd($any);
// });

// Route::get('add/{?a}/{?b/{?c}/{?d}/{?e}/{?f}/{?g}/{?h}', function(){
//     createAdd();
// });

Route::get('/{any?}', 'App\Http\Controllers\MainController1@index')
    ->where('any', '.*')
    ->name('main-any');
Route::post('/store-ad', 'App\Http\Controllers\MainController1@storeAd');
Route::post('/prepare-store-ad', 'App\Http\Controllers\MainController1@prepareStoreAd');

// function createAdd(?string $path = null){
//     (new MainController1())->createAdd($path);
// }
