<?php

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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

//baju
$router->post('/baju','BajuController@create');
$router->get('/baju','BajuController@read');
$router->post('/baju/{id}','BajuController@update');
$router->delete('/baju/{id}','BajuController@delete');
$router->get('baju/{id}','BajuController@detail');

//celana
$router->post('/celana','CelanaController@create');
$router->get('/celana','CelanaController@read');
$router->post('/celana/{id}','CelanaController@update');
$router->delete('/celana/{id}','CelanaController@delete');
$router->get('celana/{id}','CelanaController@detail');

//sepatu
$router->post('/sepatu','SepatuController@create');
$router->get('/sepatu','SepatuController@read');
$router->post('/sepatu/{id}','SepatuController@update');
$router->delete('/sepatu/{id}','SepatuController@delete');
$router->get('sepatu/{id}','SepatuController@detail');