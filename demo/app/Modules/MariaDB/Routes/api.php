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

Route::prefix('maria')->group(function (Router $router) {

    /**
     * Users
     */
    $router->get('users', 'UserController@index');

    /**
     * User Data
     */
    $router->get('users/{user}/data', 'DataController@index');

    $router->get('users/{user}/data/{key}', 'DataController@show');
    $router->put('users/{user}/data/{key}', 'DataController@save');
    $router->delete('users/{user}/data/{key}', 'DataController@destroy');

});
