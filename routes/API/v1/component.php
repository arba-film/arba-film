<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'v1/component', 'namespace' => 'API\v1\Component'], function () {

    /** Route for class ComponentController */
    // GET COUNTRY
    Route::get('country', 'ComponentController@getAllCountry');
    Route::get('country/{id}', 'ComponentController@getCountry');

    //GET GROUP_LIKE
    Route::get('groupLike', 'ComponentController@getAllGroupLike');
    Route::get('groupLike/{id}', 'ComponentController@getGroupLike');

    // GET GROUP_NOTIFICATION
    Route::get('groupNotification', 'ComponentController@getAllGroupNotification');
    Route::get('groupNotification/{id}', 'ComponentController@getGroupNotification');

    // GET GROUP_VIDEO
    Route::get('groupVideo', 'ComponentController@getAllGroupVideo');
    Route::get('groupVideo/{id}', 'ComponentController@getGroupVideo');

    // GET TYPE_COLLECTION
    Route::get('typeCollection', 'ComponentController@getAllTypeCollection');
    Route::get('typeCollection/{id}', 'ComponentController@getTypeCollection');

    // GET TYPE_NOTIFICATION
    Route::get('typeNotification', 'ComponentController@getAllTypeNotification');
    Route::get('typeNotification/{id}', 'ComponentController@getTypeNotification');

    //GET PLAYLIST
    Route::get('playlist', 'ComponentController@getPlaylistUser');
});