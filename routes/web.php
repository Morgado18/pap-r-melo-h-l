<?php

use Illuminate\Support\Facades\Route;
/*
Route::get('/', function () {
    return view('index');
})->name('pageMain'); */

Route::get('/', ['as' => 'pageMain', 'uses' => 'Visit\MainController@index']);

Auth::routes(['register' => false]);
Route::get('register', function () {
    return redirect()->back();
});


/* Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); */

/* visit routes */
Route::prefix('visit')->group(function () {
    Route::get('products', ['as' => 'visit.products', 'uses' => 'Visit\MainController@list_products']);
    Route::get('mycart', ['as' => 'visit.mycart', 'uses' => 'Visit\MainController@mycart']);
});

/* create-account */
Route::prefix('create-account')->group(function () {
    Route::get('buyer', ['as' => 'create_account.buyer', 'uses' => 'Visit\MainController@view_create_buyer']);
    Route::get('producer', ['as' => 'create_account.producer', 'uses' => 'Visit\MainController@view_create_producer']);

    Route::post('producer', ['as' => 'store.producer', 'uses' => 'CreateAccount\MainController@store_producer']);
    Route::post('buyer', ['as' => 'store.buyer', 'uses' => 'CreateAccount\MainController@store_buyer']);
});

/* cart */
Route::prefix('cart')->group(function () {
    Route::post('add/{productId}', ['as' => 'cart.add', 'uses' => 'Visit\MainController@add_cart']);
    Route::get('remove/{productId}', ['as' => 'cart.remove', 'uses' => 'Visit\MainController@remove_cart_item']);
    /* Route::get('remove/{productId}', [CartController::class, 'remove'])->name('cart.remove');
    Route::post('checkout', [CartController::class, 'checkout'])->name('cart.checkout'); */
});


/* fallback route */
Route::fallback(function () {
    return view('page-error-404');
});
