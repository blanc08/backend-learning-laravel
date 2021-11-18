<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/key', function () use ($router) {
    return \Illuminate\Support\Str::random(32);
});


// User
$router->group(['prefix' => 'users'], function () use ($router) {
    $router->get('/', 'UserController@index');
    $router->post('/store', 'UserController@store');
    $router->get('/{id}', 'UserController@show');
    $router->put('/update/{id}', 'UserController@update');
    $router->delete('/destroy/{id}', 'UserController@destroy');
});


// Product
$router->group(['prefix' => 'products'], function () use ($router) {
    $router->get('/', 'ProductController@index');
    $router->post('/store', 'ProductController@store');
    $router->get('/{id}', 'ProductController@show');
    $router->put('/update/{id}', 'ProductController@update');
    $router->delete('/destroy/{id}', 'ProductController@destroy');
});
