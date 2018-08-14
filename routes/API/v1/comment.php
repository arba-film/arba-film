<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'v1/comment', 'namespace' => 'API\v1\Comment'], function () {

    /** Route for class CommentController */
    Route::post('add', 'CommentController@addComment');

});