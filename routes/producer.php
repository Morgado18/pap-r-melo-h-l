<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'p',
    'middleware' => ['auth','producer']
], function(){
    Route::get('dash', ['as' => 'producer.dash', 'uses' => 'Authenticated\Producer\MainController@dash']);

    /* orders */
    Route::group([
        'prefix' => 'orders',
    ], function () {
        Route::get('all', ['as' => 'producer.orders.all', 'uses' => 'Authenticated\Producer\MainController@all_my_orders']);
        Route::get('mark_as/{status}/{orderId}', ['as' => 'producer.mark_as', 'uses' => 'Authenticated\Producer\MainController@mark_as']);
    });

    /* products */
    Route::group([
        'prefix' => 'products',
    ], function () {
        Route::get('all', ['as' => 'producer.products.all', 'uses' => 'Authenticated\Producer\MainController@all_my_products']);
    });

    /* costumers */
    Route::group([
        'prefix' => 'costumers',
    ], function () {
        Route::get('all', ['as' => 'producer.costumers.all', 'uses' => 'Authenticated\Producer\MainController@all_my_costumers']);
    });

    Route::get('profile', ['as' => 'producer.profile', 'uses' => 'Authenticated\Producer\MainController@my_profile']);

    /* chat */
    Route::group([
        'prefix' => 'chats',
    ], function () {
        Route::get('all', ['as' => 'producer.chats.all', 'uses' => 'Authenticated\Producer\MainController@all_my_chats']);
    });

});

