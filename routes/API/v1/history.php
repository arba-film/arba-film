<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'v1/history', 'namespace' => 'API\v1\History'], function () {

    /** Route for class HistorySpectacleController */
    Route::group(['prefix' => 'spectacle'], function () {

        Route::get('list', 'HistorySpectacleController@listHistory');
        Route::post('delete', 'HistorySpectacleController@deleteAllSpectacle');
        Route::post('delete/{id}', 'HistorySpectacleController@deleteSpecific');

    });


    /** Route for class HistorySearchController */
    Route::group(['prefix' => 'search'], function () {

        Route::get('list', 'HistorySearchController@listHistory');
        Route::post('delete', 'HistorySearchController@deleteAllSearch');
        Route::post('delete/{id}', 'HistorySearchController@deleteSpecific');
        Route::post('delete_all', 'HistorySearchController@deleteAllHistory');

    });


    /** Route for class HistoryLoginController */
    Route::group(['prefix' => 'login'], function () {

        Route::get('list', 'HistoryLoginController@listHistory');

    });

});