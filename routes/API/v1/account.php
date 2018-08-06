<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'v1/account', 'namespace' => 'API\v1\Account'], function () {

    Route::post('registration', 'RegistrationController@registration');
    Route::post('login', 'LoginController@login');
    Route::get('login/success', 'LoginController@success');
    Route::post('logout', 'LoginController@logout');
    Route::get('get_data_login', 'LoginController@getDataLogin');

});