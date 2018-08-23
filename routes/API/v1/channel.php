<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'v1/channel', 'namespace' => 'API\v1\Channel'], function () {

    /** Route for class ChannelController */
    Route::get('list', 'ChannelController@listChannel');
    Route::post('add', 'ChannelController@addChannel');
    Route::get('detail/{id}', 'ChannelController@vdChannel');
    Route::post('update', 'ChannelController@updateChannel');
    Route::post('delete', 'ChannelController@deleteChannel');


    /** Route for class ViewChannelController */
    Route::group(['prefix' => 'view'], function () {

        Route::get('dashboard', 'ViewChannelController@dashboard');
        Route::get('video', 'ViewChannelController@listVideo');
        Route::get('playlist', 'ViewChannelController@playlist');
        Route::get('subscription', 'ViewChannelController@subscription');
        Route::get('about', 'ViewChannelController@about');

    });


    /** Route for class VisitorChannelController */
    Route::group(['prefix' => 'visitor'], function () {

        Route::get('dashboard/{id}', 'VisitorChannelController@visitorDashboard');
        Route::get('video/{id}', 'VisitorChannelController@visitorListVideo');
        Route::get('playlist/{id}', 'VisitorChannelController@visitorPlaylist');
        Route::get('subscription/{id}', 'VisitorChannelController@visitorSubscription');
        Route::get('about/{id}', 'VisitorChannelController@visitorAbout');

    });


    /** Route for class SwitchController */
    Route::group(['prefix' => 'switch'], function () {

        Route::get('list', 'SwitchController@listChannel');
        Route::post('process/{id}', 'SwitchController@processSwitch');

    });

});