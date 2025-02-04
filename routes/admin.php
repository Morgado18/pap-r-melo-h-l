<?php

use Illuminate\Support\Facades\Route;


Route::group([
    'prefix' => 'admin',
    'middleware' => ['auth','admin']
], function(){
    Route::get('dash', ['as' => 'admin.dash', 'uses' => 'Authenticated\Admin\MainController@dash']);

    /* products */
    Route::group([
        'prefix' => 'products',
    ], function () {
        Route::get('all', ['as' => 'admin.products.all', 'uses' => 'Authenticated\Admin\MainController@all_products']);
        Route::get('available', ['as' => 'admin.products.available', 'uses' => 'Authenticated\Admin\MainController@available_products']);
        Route::get('unavailable', ['as' => 'admin.products.unavailable', 'uses' => 'Authenticated\Admin\MainController@unavailable_products']);
        Route::get('pending', ['as' => 'admin.products.pending', 'uses' => 'Authenticated\Admin\MainController@pending_products']);
        Route::get('sold_out', ['as' => 'admin.products.sold_out', 'uses' => 'Authenticated\Admin\MainController@sold_out_products']);

        Route::post('store', ['as' => 'admin.products.store', 'uses' => 'Authenticated\Admin\Products\MainController@store']);
        Route::post('update/{slug}', ['as' => 'admin.products.update', 'uses' => 'Authenticated\Admin\Products\MainController@update']);
        Route::get('remove/{slug}', ['as' => 'admin.products.remove', 'uses' => 'Authenticated\Admin\Products\MainController@remove']);
    });

    /* activities */
    Route::group([
        'prefix' => 'activities',
    ], function () {
        Route::get('logs', ['as' => 'admin.activities.logs', 'uses' => 'Authenticated\Admin\MainController@logs']);
        Route::get('visits', ['as' => 'admin.activities.visits', 'uses' => 'Authenticated\Admin\MainController@visits']);
    });

    /* administration */
    Route::group([
        'prefix' => 'administration',
    ], function () {
        /* users */
        Route::group([
            'prefix' => 'users',
        ], function () {
            Route::get('all', ['as' => 'admin.administration.users.all', 'uses' => 'Authenticated\Admin\MainController@all_users']);

            Route::post('store', ['as' => 'admin.administration.users.store', 'uses' => 'Authenticated\Admin\Administration\User\MainController@store']);
            Route::post('update/{id}', ['as' => 'admin.administration.users.update', 'uses' => 'Authenticated\Admin\Administration\User\MainController@update']);
            Route::get('remove/{id}', ['as' => 'admin.administration.users.remove', 'uses' => 'Authenticated\Admin\Administration\User\MainController@remove']);
        });

        /* producers */
        Route::group([
            'prefix' => 'producers',
        ], function () {
            Route::get('all', ['as' => 'admin.administration.producers.all', 'uses' => 'Authenticated\Admin\MainController@all_producers']);

            Route::post('store', ['as' => 'admin.administration.producers.store', 'uses' => 'Authenticated\Admin\Administration\Producer\MainController@store']);
            Route::post('update/{id}', ['as' => 'admin.administration.producers.update', 'uses' => 'Authenticated\Admin\Administration\Producer\MainController@update']);
            Route::get('remove/{id}', ['as' => 'admin.administration.producers.remove', 'uses' => 'Authenticated\Admin\Administration\Producer\MainController@remove']);
        });

        /* buyers */
        Route::group([
            'prefix' => 'buyers',
        ], function () {
            Route::get('all', ['as' => 'admin.administration.buyers.all', 'uses' => 'Authenticated\Admin\MainController@all_buyers']);

            Route::post('store', ['as' => 'admin.administration.buyers.store', 'uses' => 'Authenticated\Admin\Administration\Buyer\MainController@store']);
            Route::post('update/{id}', ['as' => 'admin.administration.buyers.update', 'uses' => 'Authenticated\Admin\Administration\Buyer\MainController@update']);
            Route::get('remove/{id}', ['as' => 'admin.administration.buyers.remove', 'uses' => 'Authenticated\Admin\Administration\Buyer\MainController@remove']);
        });
    });

});
