<?php

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

$router->get('/', function () use ($router) {
    return get_frontend_view('welcome');
});

$router->get('/text-tool/convert-blank-space-to-break-line', 'TextToolController@convertBlankSpaceToBreakLine');
$router->post('/text-tool/convert-blank-space-to-break-line', 'TextToolController@convertBlankSpaceToBreakLine');

$router->get('/text-tool/convert-break-line-to-blank-space', 'TextToolController@convertBreakLineToBlankSpace');
$router->post('/text-tool/convert-break-line-to-blank-space', 'TextToolController@convertBreakLineToBlankSpace');
