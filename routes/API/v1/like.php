<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'v1/like', 'namespace' => 'API\v1\Like'], function () {

    /** Route for class LikeController */
    Route::post('add', 'LikeController@like');
    Route::post('dislike', 'LikeController@dislike');

});