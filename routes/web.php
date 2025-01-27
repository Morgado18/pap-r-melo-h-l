<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('pageMain');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('visit')->group(function () {
    Route::get('products', ['as'=>'visit.products','uses'=>'Visit\MainController@list_products']);
});
