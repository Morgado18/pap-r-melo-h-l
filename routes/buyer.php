
<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'b',
    'middleware' => ['auth','buyer']
], function(){
    Route::get('dash', ['as' => 'buyer.dash', 'uses' => 'Authenticated\Buyer\MainController@dash']);
    Route::post('finalizepurchase', ['as' => 'buyer.finalizepurchase', 'uses' => 'Authenticated\Buyer\MainController@finalizepurchase']);
});
