<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'v1/channel', 'namespace' => 'API\v1\Channel'], function () {

    Route::get('list', 'ChannelController@listChannel');
    Route::post('add', 'ChannelController@addChannel');
    Route::get('detail/{id}', 'ChannelController@vdChannel');
    Route::post('update', 'ChannelController@updateChannel');
    Route::post('delete', 'ChannelController@deleteChannel');

});