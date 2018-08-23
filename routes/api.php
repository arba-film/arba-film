<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

$API = 'routes/API/v1/';

/*
|--------------------------------------------------------------------------
| Route for API react
|--------------------------------------------------------------------------
*/
require(base_path($API . 'account.php'));
require(base_path($API . 'channel.php'));
require(base_path($API . 'comment.php'));
require(base_path($API . 'component.php'));
require(base_path($API . 'history.php'));
require(base_path($API . 'like.php'));
require(base_path($API . 'notification.php'));
require(base_path($API . 'subscription.php'));
require(base_path($API . 'video.php'));


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
