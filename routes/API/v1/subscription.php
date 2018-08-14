<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'v1/subscription', 'namespace' => 'API\v1\Subscription'], function () {

    /** Url for class SubscriptionController */
    Route::get('list', 'SubscriptionController@listVideo');
    Route::post('subscribe', 'SubscriptionController@addSubscribe');
    Route::post('unsubscribe', 'SubscriptionController@unSubscribe');

});