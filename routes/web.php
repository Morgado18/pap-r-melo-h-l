<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('pageMain');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/* visit routes */
Route::prefix('visit')->group(function () {
    Route::get('products', ['as'=>'visit.products','uses'=>'Visit\MainController@list_products']);
});

/* create-account */
Route::prefix('create-account')->group(function () {
    Route::get('buyer', ['as' => 'create_account.buyer', 'uses' => 'Visit\MainController@view_create_buyer']);
    Route::get('producer', ['as' => 'create_account.producer', 'uses' => 'Visit\MainController@view_create_producer']);
});
