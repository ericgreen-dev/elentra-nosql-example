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

    /**
     * Users
     */
    $router->get('users', 'UserController@index');

    /**
     * User Data
     */
    $router->get('user-data', 'DataController@index');

    $router->get('user-data/{key}', 'DataController@show');
    $router->put('user-data/{key}', 'DataController@save');
    $router->delete('user-data/{key}', 'DataController@destroy');

});
