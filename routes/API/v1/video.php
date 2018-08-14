<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'v1/video', 'namespace' => 'API\v1\Video'], function () {

    /** Route for class VideoController */
    Route::get('list', 'VideoController@listVideo');
    Route::post('add', 'VideoController@addVideo');
    Route::get('detail/{id}', 'VideoController@detailVideo');
    Route::post('update', 'VideoController@updateVideo');
    Route::post('delete', 'VideoController@deleteVideo');
    Route::post('play', 'VideoController@playVideo');

    /** Route for class PlaylistController */
    Route::group(['prefix' => 'playlist'], function () {

        Route::post('add', 'PlayListController@addPlaylist');
        Route::get('list', 'PlayListController@listPlaylist');
        Route::post('update', 'PlayListController@updatePlaylist');
        Route::post('delete', 'PlayListController@deletePlaylist');

    });

});