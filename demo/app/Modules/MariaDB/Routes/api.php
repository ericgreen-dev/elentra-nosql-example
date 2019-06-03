<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your module. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('maria')->middleware('auth.basic')->group(function (Router $router) {
    $router->get('user-data', 'UserDataController@index');
    $router->get('user-data/{key}', 'UserDataController@show');
    $router->put('user-data/{key}', 'UserDataController@save');
    $router->delete('user-data/{key}', 'UserDataController@destroy');
});
